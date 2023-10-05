# PPDB SMPTQ PANGERAN DIPONEGORO

## Persyaratan

Sebelum Anda mulai, pastikan komputer Anda sudah memenuhi persyaratan berikut:

- [PHP](https://www.php.net/) versi x.x.x atau yang lebih tinggi
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) dan [npm](https://www.npmjs.com/)
- [Laragon](https://laragon.org/) atau [XAMPP](https://www.apachefriends.org/index.html) (opsional)

## Instalasi

Ikuti langkah-langkah ini untuk menginstal proyek Anda:

Disclaimer:
- Add database bernama "laravel" di phpmyadmin database local terlebih dahulu.

1. **Clone repositori ini:**

    ```bash
    git clone https://github.com/takamanu/ppdb_smp.git
    ```

2. **Pindah ke direktori proyek:**

    ```bash
    cd nama-proyek
    ```

3. **Atur konfigurasi database di file .env:**

    Edit file .env menggunakan teks editor Anda dan atur informasi database Anda:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4. **Instal dependensi PHP menggunakan Composer:**

    ```bash
    composer install
    ```
5. **Jalankan migrasi database dan pengisian awal (seeder), jika diperlukan:**

    ```bash
    php artisan migrate:fresh
    ```
    ```bash
    php artisan db:seed DatabaseSeeder
    ```

6. **Jalankan server pengembangan:**

    ```bash
    php artisan serve
    ```

7. **Buka aplikasi di browser Anda:**

    Buka browser Anda dan kunjungi `http://localhost:8000`.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan ikuti langkah-langkah ini:

1. Fork repositori ini.
2. Buat cabang baru (`git checkout -b fitur-anda`)
3. Buat komit untuk perubahan Anda (`git commit -m 'Menambahkan fitur baru'`)
4. Dorong komit Anda ke cabang Anda (`git push origin fitur-anda`)
5. Buat pull request ke repositori ini.

## Lisensi

Tulis lisensi proyek Anda di sini (misalnya MIT, Apache 2.0, dsb.).

---
