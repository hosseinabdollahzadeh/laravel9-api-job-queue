1- Clone project:
https://github.com/hosseinabdollahzadeh/test-api.git

2- composer install & npm install

3- copy .env.example to .env
    
4- insert DB info to .env file

5- set QUEUE_CONNECTION=database in .env file

4- php artisan cache:clear

5- php artisan key:generate

6- php artisan migrate

7- Url for get json response and dispatch to queue for insert data into DB:
    http://test-api-master.test/api/json

8- Url for get xml response and dispatch to queue for insert data into DB:
    http://test-api-master.test/api/xml
