#!/usr/bin/bash
# 
#scp -i /root/.ssh/id_rsa root@192.168.0.2:/home/httpd/data/3jyoDB/memo.txt /var/www/datafile
#
#LOG_NAME="import_$(date +'%Y%m%d%H%M%S').txt"

FILE_NAME="memo.txt"
ORIGINAL_FILE_PATH="root@192.168.0.2:/home/httpd/data/3jyoDB/"$FILE_NAME
DESTINATION_FILE_PATH="/var/www/datafile"

LOG_NAME="import_$(date +'%Y%m%d').txt"
LOG_OUT="/var/www/html/laravel/storage/logs/shlog/"$LOG_NAME

echo "["$(date +'%Y-%m-%d_%H:%M:%S')"]" >>$LOG_OUT
echo -e "[import-file]"$ORIGINAL_FILE_PATH | tee -a $LOG_OUT 2>>$LOG_OUT
scp -i /root/.ssh/id_rsa $ORIGINAL_FILE_PATH $DESTINATION_FILE_PATH >>$LOG_OUT 2>>$LOG_OUT
#script -q -c 'scp -i /root/.ssh/id_rsa '$ORIGINAL_FILE_PATH' '$DESTINATION_FILE_PATH | tee -a $LOG_OUT 2>>$LOG_OUT


