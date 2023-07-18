<template>
  <div>
    <div id="mainte_cnt_title">
      <h1>Import<br>　　Export<br>　　　　Backup</h1>
    </div>
    <div id="backup_btnzone">
      <div class="btnitem">
        <button type="button" id="act_imp_btn" @click="importButtonClick();">インポート<p><img src="/images/bak_im.png"></p></button>
      </div>
      <div class="btnitem">
        <button type="button" id="act_exp_btn" @click="exportButtonClick();">エクスポート<p><img src="/images/bak_ex.png"></p></button>
      </div>
      <div class="btnitem">
        <button type="button" id="act_bak_btn" @click="backupButtonClick();">バックアップ<p><img src="/images/bak_back.png"></p></button>
      </div>
    </div>
    <!--end mnt_actionbtn-->
    <div id="backup_infozone">
      <h3></h3>
      <div id="tbl_1">
        <table>
          <thead>
            <tr>
              <th class="nrap">日時</th>
              <th class="w2 nrap">種類</th>
              <th class="nrap">作業テーブル</th>
              <th class="nrap">対象テーブル</th>
              <th class="nrap">ステータス</th>
              <th class="nrap">開始時間</th>
              <th class="nrap">終了時間</th>
              <th class="nrap">所要時間</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="nrap">2022年7月22日</td>
              <td class="nrap">バックアップ</td>
              <td class="nrap">quotations</td>
              <td></td>
              <td><span class="err">失敗</span></td>
              <td>14時30分</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="nrap">2022年7月21日</td>
              <td class="nrap">エクスポート</td>
              <td>quotations</td>
              <td>Mitumori.DAT</td>
              <td>成功</td>
              <td class="nrap">10時03分</td>
              <td class="nrap">10時05分</td>
              <td>2分</td>
            </tr>
            <tr>
              <td>2022年7月21日</td>
              <td>エクスポート</td>
              <td>quotations_binding</td>
              <td>Mitumori.DAT</td>
              <td>成功</td>
              <td>10時05分</td>
              <td>10時06分</td>
              <td>1分</td>
            </tr>
            <tr>
              <td>2022年7月21日</td>
              <td>エクスポート</td>
              <td>quotations_cost</td>
              <td>Mitumori.DAT</td>
              <td>成功</td>
              <td>10時06分</td>
              <td>10時07分</td>
              <td>1分</td>
            </tr>
            <tr>
              <td>2022年7月21日</td>
              <td>エクスポート</td>
              <td>quotations_department</td>
              <td>Mitumori.DAT</td>
              <td>成功</td>
              <td>10時07分</td>
              <td>10時08分</td>
              <td>1分</td>
            </tr>
            <tr>
              <td>2022年7月21日</td>
              <td>エクスポート</td>
              <td>quotations_parts</td>
              <td>Mitumori.DAT</td>
              <td>成功</td>
              <td>10時08分</td>
              <td>10時11分</td>
              <td>3分</td>
            </tr>
            <tr>
              <td>2022年7月20日</td>
              <td>インポート</td>
              <td>quotations</td>
              <td>Mitumori.DAT</td>
              <td>成功</td>
              <td>14時30分</td>
              <td>14時31分</td>
              <td>1分</td>
            </tr>
            <tr>
              <td>2022年7月20日</td>
              <td>インポート</td>
              <td>quotations_binding</td>
              <td>Mitumori.DAT</td>
              <td>成功</td>
              <td>14時31分</td>
              <td>14時32分</td>
              <td>1分</td>
            </tr>
            <tr>
              <td>2022年7月20日</td>
              <td>インポート</td>
              <td>quotations_cost</td>
              <td>Mitumori.DAT</td>
              <td>成功</td>
              <td>14時32分</td>
              <td>14時33分</td>
              <td>1分</td>
            </tr>
            <tr>
              <td>2022年7月20日</td>
              <td>インポート</td>
              <td>quotations_department</td>
              <td>Mitumori.DAT</td>
              <td>成功</td>
              <td>14時33分</td>
              <td>14時34分</td>
              <td>1分</td>
            </tr>
            <tr>
              <td>2022年7月20日</td>
              <td>インポート</td>
              <td>quotations_parts</td>
              <td>Mitumori.DAT</td>
              <td>成功</td>
              <td>14時34分</td>
              <td>14時37分</td>
              <td>3分</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--end backup_infozone-->
  </div>
</template>

<script>
import moment from "moment";
import { dialogable } from "../mixins/dialogable.js";
import { checkable } from "../mixins/checkable.js";
import { requestable } from "../mixins/requestable.js";

// CONST
const CONST_IMPORT_REG = '見積インポート';

export default {
  name: 'BackupLogs',
  mixins: [dialogable, checkable, requestable],
  props: {
    authusers: {
      type: Array,
      default: []
    }
  },
  data() {
    return {
      details: [],
      informations: [],
      content: "",
      login_user_code: 0,
      login_user_role: 0,
      phasecnt: 0,
      dialogVisible: false,
      messageshowsearch: false,
      infomationmessage: [],
      message: "",
      showMessage: true,
    };
  },
  // マウント時
  mounted() {
  },
  methods: {
    // ------------------------ バリデーション ------------------------------------
    // ------------------------ イベント処理 ------------------------------------
    // インポートボタンの処理
    importButtonClick: function(value) {
      var messages = [];
      messages.push("インポート処理開始しますか？");
      this.htmlMessageSwal("インポート実行確認", messages, "info", true, true).then(
        result => {
          if (result) {
            this.phasecnt = 1;
            this.importDataMain();
          }
        }
      );
    },
    // ------------------------ サーバー処理 ----------------------------
    // インポートAPI
    importDataMain() {
      console.log('importDataMain in this.phasecnt = ' + this.phasecnt);
      // 処理中メッセージ表示
      this.$swal({
        title: "処　理　中...",
        html: "",
        allowOutsideClick: false, //枠外をクリックしても画面を閉じない
        showConfirmButton: false,
        showCancelButton: true,
        onBeforeOpen: () => {
          this.$swal.showLoading();
          var arrayParams = { mode: 'import', identification: this.phasecnt };
          this.postRequest("/maintenance/backup/importmitumoridat", arrayParams)
            .then(response => {
              console.log('importDataMain in this.phasecnt end ' + this.phasecnt);
              this.$swal.close();
              this.importThen(response);
            })
            .catch(reason => {
              this.$swal.close();
              this.serverCatch("import/export", CONST_IMPORT_REG);
          });
        }
      });
    },
    // -------------------- 共通 ----------------------------
    importThen(response) {
      console.log('importThen in');
      var res = response.data;
      if (res.result) {
        if (!res.procend) {
          this.phasecnt++;
          this.importDataMain();
        }
      } else {
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("エラー", res.messagedata, "error", true, false);
        } else {
          this.serverCatch("import/export", "登録");
        }
      }
    },
    // 異常処理
    serverCatch(kbn, eventtext) {
      console.log('serverCatch in');
      var messages = [];
      messages.push(kbn + eventtext + "に失敗しました");
      this.htmlMessageSwal("エラー", messages, "error", true, false);
    },
  }
};
</script>
