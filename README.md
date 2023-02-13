<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About SI-TRISKA

SI-TRISKA (Sistem Informasi Geografis Tingkat Risiko Kebakaran) adalah sebuah aplikasi WebGIS yang berguna untuk memetakan zonasi tingkat risiko kebakaran permukiman di kota banjarmasin. Aplikasi ini dikembangkan menggunakan framework Laravel 7 dan Google Maps API. Sementara ini fitur yang ada pada SI-TRISKA yaitu :

- Kalkulasi besaran tingkat risiko kebakaran pada suatu permukiman
- Menampilkan zonasi tingkat risiko kebakaran permukiman pada tampilan map digital
- Membuat report besaran tingkat risiko kebakaran pada permukiman
- Menampilkan data tingkat risiko kebakaran permukiman dalam bentuk grafik.

metode yang digunakan dan semua fitur yang ada masih perlu dikembangkan lagi.

## How to Install

1. Download atau clone sourcecode SI-TRISKA dari repository ini.
2. Install package & dependency yang dibutuhkan menggunakan Composer, pada terminal ketik perintah: composer install
3. Buat database baru pada mysql, contoh database: si_triska
4. copy file ".env.example" ubah menjadi ".env"
5. Setting koneksi database mysql pada file ".env" yang baru. Sesuaikan database, username dan password mysql-nya
6. import table beserta data-data aplikasi dengan cara, pada terminal jalankan perintah : php artisan migrate:refresh --seed
7. Login sebagai administrator menggunakan username dan password default melalui alamat : http://localhost/administrator/

## Contributing

Terbuka untuk semua yang ingin berkontribusi,silahkan fork repositori ini ke github anda, dan silahkan buat pull-request.


## License

source-code ini dilisensikan di bawah lisensi [MIT license](https://opensource.org/licenses/MIT).
