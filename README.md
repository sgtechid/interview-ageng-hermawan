<!-- PROJECT LOGO -->
<br />
<div align="center">
    <h3 align="center">CMS - Dashboard</h3>
    <a href="https://ageng.meepulm.com/">
        <img src="https://ageng.meepulm.com/assets/img/ss-login.png" alt="Logo">
    </a>
    <h3 align="center">View Demo - Dashboard at 'https://ageng.meepulm.com' </h3>
</div>

<!-- ABOUT THE PROJECT -->

## Tentang Aplikasi ini

Aplikasi ini adalah Content Management System (CMS) yang memungkinkan pengguna untuk mengelola konten dan pengguna.
Setiap pengguna memiliki otorisasi yang berbeda-beda tergantung pada peran mereka. CMS ini memungkinkan pengguna untuk:

-   Login dan Manajemen Pengguna: Pengguna dapat login ke dalam sistem dan administrator dapat mengelola pengguna serta
    peran mereka.
-   Otorisasi Berbasis Peran: Setiap pengguna memiliki otorisasi yang berbeda-beda berdasarkan peran mereka.
-   Konverter Mata Uang: Aplikasi ini menyediakan konverter mata uang yang menggunakan data dari Free Currency API untuk
    mengonversi nilai mata uang dari IDR ke USD. Konversi mata uang dilakukan otomatis setiap 12 jam menggunakan cron job.

### Membuat dengan menggunakan

-   [Laravel](https://laravel.com)
-   [MYSQL](https://www.mysql.com/)
-   [Bootstrap](https://getbootstrap.com)
-   [JQuery](https://jquery.com)
-   [Material Dashboard 2]

<!-- GETTING STARTED -->

## MULAI

Langkah Langkah Melakukan installasi aplikasi ini:

### Kebutuhan Aplikasi

Aplikasi yang dibutuhkan sebelum melakukan installasi

-   Composer

```sh
https://getcomposer.org/
```

-   Code Editor

```sh
1. Visual Studio
2. PhpStrom
```

-   PHP 7.4

```sh
https://www.php.net/
```

-   Framework yang digunakan ( Tertera pada atas )
-   MYSQL

```sh
https://www.mysql.com/
```

### Instalasi

1. Clone repo ini

```sh
git clone https://github.com/sgtechid/interview-ageng-hermawan.git
```

2. Install Composer packages

```sh
Install composer yang telah di download sebelumnya
```

3. Buka terminal cmd pada folder yang telah kita clone tadi
4. Jalankan perintah

```sh
composer install
```

Pada termintal tersebut (Jangan lupa arahkan directory berdasarkan folder yang telah kita clone tadi ) 5. Menunggu
hingga proses install selesai 6. Jika selesai, Jalankan di terminal dengan perintah

```sh
php artisan serve
```

Perintah di atas untuk menjalankan aplikasi 7. Install MYSQL yang telah di download 8. Buat database baru pada mysql
(phpmyadmin) dengan nama sgtechid (opsional) 9. Masuk kedalam folder yang telah kita clone tadi 10. Lalu duplikat file
.env.example, setelah di duplikat ubah (rename) file menjadi .env 11. kembali ke terminal lalu ketikan perintah

```sh
php artisan key:generate
```

12. Buka file env yang telah kita rename tadi lalu seting

```sh
DB_DATABASE, DB_USERNAME, DB_PASSWORD
```

Sesuaikan dengan Database mysql kamu 13. Jalankan perintah pada terminal

```sh
php artisan migrate db:seed
```

Untuk melakukan migrate table yang telah dibuat 14. Aplikasi Siap digunakan

## User For Testing Role Admin & User

-   Role Admin :
-   Email : admin@gmail.com , Password : admin123
-   Role User :
-   Email : user@gmail.com , Password : user123
