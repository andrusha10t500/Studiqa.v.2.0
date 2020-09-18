#/bin/bash

for i in $HOME/document/STUDIQA.v.2.0/public/A/*; do docker-compose exec -T dba mysql -uroot -ppassword -D studiqa -e "insert into images (event,image) values ('A','A/"${i##*/}"');"; done


