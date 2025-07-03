# Aplikasi PWA Sederhana Berbasis Laravel

## Spesifikasi

-   Laravel versi 10
-   PHP 8.1
-   Composer versi 2
-   [Library laravel-pwa](https://github.com/shailesh-ladumor/laravel-pwa)

## Deskripsi Aplikasi

Sebuah aplikasi web untuk pencatatan pengeluaran. Fitur masih terbatas hanya tambah, edit, dan hapus data. Tidak ada autentikasi. Tidak ada paginasi. Tidak disarankan untuk digunakan untuk production. Hanya untuk pembelajaran saja.

## Cara Install

Download folder proyek-akhir. Kemudian lakukan instalasi aplikasi dengan masuk ke dalam folder kemudian jalankan `composer install`.

```
cd proyek-akhir
composer install
```

Copy file .env.example menjadi .env.

```
cp .env.example .env
```

Generate key dengan perintah `php artisan key:generate`.

Buat database, kemudian lakukan pengaturan database.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Lakukan migrasi dengan perintah `php artisan migrate`.

Terakhir lakukan publish asset.

```
php artisan laravel-pwa:publish
```

Jalankan server.

```
php artisan serve
```
