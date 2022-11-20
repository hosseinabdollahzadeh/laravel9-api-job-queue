1- Clone project:
https://github.com/hosseinabdollahzadeh/test-api.git

2- composer install & php artisan cache:clear

3- php artisan key:generate

4- npm install

5- copy .env.example to .env
    5-1- insert DB info:
        exp:
        DB_DATABASE=test_api
        DB_USERNAME=root
        DB_PASSWORD=123
    5-2- set QUEUE_CONNECTION=database

6- php artisan migrate

7- Url for get json response and dispatch to queue for insert data into DB:
    exp:
    http://test-api.test/api/json

8- Url for get xml response and dispatch to queue for insert data into DB:
    exp:
    http://test-api.test/api/xml
