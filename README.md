# smart-in-media

### To start project in the development mode run the following commands: 

1. `docker-compose build`
2. `docker-compose up`
    There will be a message like `Project is running at http://192.168.56.101:3000/` in the console output. Save URL for step 4.
3. `cat backup.sql | docker exec -i smart-in-media_mysql_1 /usr/bin/mysqldump -u root --password=rootpass smartmedia`
4. Open `http://192.168.56.101:3000/`
