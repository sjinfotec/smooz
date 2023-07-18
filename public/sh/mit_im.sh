#!/usr/bin/bash

#
# 引数
#     $1: smoothurl
#     $2: 取り込み元ファイル名
#     $3: 取り込み元パス名
#     $4: 取り込み先パス名
#     $5: logパス名
#     $6: logキーワード
#
#scp -i /root/.ssh/id_rsa root@192.168.0.2:/home/httpd/data/3jyoDB/memo.txt /var/www/datafile
#
#LOG_NAME="import_$(date +'%Y%m%d%H%M%S').txt"

# 取り込み元ファイル名
# FILE_NAME="memo.txt"
FILE_NAME=$2
# 取り込み元ファイルフルパス名
# ORIGINAL_FILE_PATH="root@192.168.0.2:/home/httpd/data/3jyoDB/"$FILE_NAME
ORIGINAL_FILE_PATH=$1":"$3$FILE_NAME
# 取り込み先パス名
# DESTINATION_FILE_PATH="/var/www/datafile"
DESTINATION_FILE_PATH=$4
# logファイル名
LOG_NAME=$FILE_NAME"_"$6"_$(date +'%Y%m%d').log"
# LOG_OUT="/var/www/html/laravel/storage/logs/shlog/"$LOG_NAME
LOG_OUT=$5$LOG_NAME

echo "["$(date +'%Y-%m-%d_%H:%M:%S')"]" >>$LOG_OUT
echo -e "[import-file]"$ORIGINAL_FILE_PATH | tee -a $LOG_OUT 2>>$LOG_OUT
#echo "root"
#scp -i /root/.ssh/id_rsa $ORIGINAL_FILE_PATH $DESTINATION_FILE_PATH >>$LOG_OUT 2>>$LOG_OUT
sudo -S scp -i /root/.ssh/id_rsa $ORIGINAL_FILE_PATH $DESTINATION_FILE_PATH >>$LOG_OUT 2>>$LOG_OUT
#script -q -c 'scp -i /root/.ssh/id_rsa '$ORIGINAL_FILE_PATH' '$DESTINATION_FILE_PATH | tee -a $LOG_OUT 2>>$LOG_OUT


