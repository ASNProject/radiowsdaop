## Radiowsdaop

##### Clone Project
```
git clone https://github.com/ASNProject/radiowsdaop.git
```
<b > Jika menggunakan xampp/ Windows, download file dan simpan di dalam C:/xampp/htdocs</b>

- Rename .env.example dengan .env dan sesuaikan pengaturan DB seperti dibawah
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_radiowsdaop
DB_USERNAME=root
DB_PASSWORD=
```

- Download database di folder ```sql``` dan import di mysql

##### Run Project
- Run Composer
```
composer update
```

- Run server
```
php artisan serve
```
- Development
```
php artisan serve --host=0.0.0.0 --port=8000
```

#### Route
##### VAMPS
- Post
```
Route : http://127.0.0.1:8000/api/vamps

Body: 
{
    "voltage": 12345
}
```
- Get 
```
Route : http://127.0.0.1:8000/api/vamps
```