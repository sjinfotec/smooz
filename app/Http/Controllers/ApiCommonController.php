<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Carbon\Carbon;
use App\Models\BackupLogs;

class ApiCommonController extends Controller
{

    protected $table_backup_logs = 'backup_logs';

    // シェル起動
    //   $shname: 起動するshファイル名
    //   $targetpath: 取り込み元パス名
    //   $targetfile: 取り込み元ファイル名
    //   $sh_keyword: logファイル名の一部（機能名）  importとかexportとかbackupとか
    public function shExec($shname, $targetpath, $targetfile, $sh_keyword)
    {
        try {
            // $smooth_url: smoothurl
            // $targetfile: 取り込み元ファイル名
            // $targetpath: 取り込み元パス名
            // $dest_path: 取り込み先パス名
            // $log_path: logパス名
            // $sh_keyword: logキーワード
            $command = Config::get('const.FILE_PATH.path_sh_smooth').$shname;
            $smooth_url = Config::get('const.HOST_INFO.scp_smooth');
            $dest_path = Config::get('const.FILE_PATH.path_smooth_dest');
            $log_path = Config::get('const.FILE_PATH.path_app_log');
            Log::debug('shExec $command = '.$command);
            Log::debug('shExec $smooth_url = '.$smooth_url);
            Log::debug('shExec $targetfile = '.$targetfile);
            Log::debug('shExec $targetpath = '.$targetpath);
            Log::debug('shExec $dest_path = '.$dest_path);
            Log::debug('shExec $log_path = '.$log_path);
            Log::debug('shExec $sh_keyword = '.$sh_keyword);
            Log::debug('shExec shell_exec = '.$command." ".$smooth_url." ".$targetfile." ".$targetpath." ".$dest_path." ".$log_path." ".$sh_keyword);
            Log::debug('shExec exec = '."sudo scp -i /root/.ssh/id_rsa ".$smooth_url.":".$targetpath.$targetfile." ".$dest_path);
            // exec("sudo scp -i /root/.ssh/id_rsa ".$smooth_url.":".$targetpath.$targetfile." ".$dest_path);
            $results = shell_exec($command." ".$smooth_url." ".$targetfile." ".$targetpath." ".$dest_path." ".$log_path." ".$sh_keyword);
            // $results = shell_exec("echo 'root' | sudo -S ".$command." ".$smooth_url." ".$targetfile." ".$targetpath." ".$dest_path." ".$log_path." ".$sh_keyword);
            // $process = new Process(["echo", "'root'"]);
            // $process->run();
            // $process = new Process(["sudo ".$command, $smooth_url, $targetfile, $targetpath, $dest_path, $log_path, $sh_keyword]);
            // $process->run();
            
            Log::debug('shExec $run end');
            // $output = $process->getOutput() ?: $process->getErrorOutput();
            
            // if (!$process->isSuccessful()) {
            //     // ...
            //     throw new ProcessFailedException($process);
            // }
            // if ($results == null) {
            //     throw new ProcessFailedException($process);
            // }
            if ($results == null) {
                return false;
            }
            return true;
        } catch (ProcessFailedException $pe) {
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_shell')).'$pe');
            Log::error($pe->getMessage());
            throw $pe;
        }
    }

    //
    //  バックアップログ作成
    //  @params     bkuplog_model

    public function upBackupLog($bkuplog_model)
    {
        Log::debug('upBackupLog in');
        $this->array_messagedata = array();
        $maxseq = 0;
        try {
            // 最大log連番取得
            $maxseq = $bkuplog_model->getMaxSeq();
            Log::debug('upBackupLog $maxseq = '.$maxseq);
            if ($maxseq == null) {
                $maxseq = 1;
            } else {
                $maxseq+=1;
            }
            $bkuplog_model->setSeqAttribute($maxseq);
            return $bkuplog_model->insertItem();
        } catch (ProcessFailedException $pe) {
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$pe');
            Log::error($pe->getMessage());
            throw $pe;
        }
    }

    /**
     * 時間差を求める（時間）
     *
     * @return 時間差
     */
    public function diffTimeTime($time_from, $time_to){
        $from = new Carbon($time_from);
        $to   = new Carbon($time_to); 
        $interval = $from->diff($to);
        // 時間単位の差
        $dif_time = $interval->format('%H%I%S');
        return $dif_time;
    }
    
    /**
     * 時間差を求める（シリアルで返却）
     *
     * @return 時間差
     */
    public function diffTimeSerial($time_from, $time_to){
        $from = strtotime(date('Y-m-d H:i:00',strtotime($time_from)));
        $to   = strtotime(date('Y-m-d H:i:00',strtotime($time_to))); 
        $interval = $to - $from;
        return $interval;
    }

}
