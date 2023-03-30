<h1 style="text-align:center; font-weight:bolder;">Catatan Saat Akan Melakukan Git Clone</h1>

## Beberapa Catatan Terkait Penggunaan Repository Ini
1. Silahkan melakukan clone pada repository ini dengan meng-copy url repository

2. Setelah melakukan clone ketikan di terminal perintah berikut. Bertujuan agar APP KEY update otomatis dan vendor akan terinstal serta .env akan terbentuk
    ```shell
        composer install
    ```
    ```shell
        cp .env.example .env
    ```
    ```shell
        php artisan key:generate
    ```
3.  Jalankan perintah dibawah untuk melakukan migration dan seeding data
    ```shell
        php artisan migrate --seed
    ```
4.  Package yang sudah terinstal
    - Laravel Debugbar -> Untuk membantu proses debug
        ```shell
        composer require barryvdh/laravel-debugbar --dev
        ```
    - Laravel Query Detector -> Membantu proses pengecekan query
        ```shell
        composer require beyondcode/laravel-query-detector --dev
        ```
    - Laravel IDE Helper
        ```shell
        composer require --dev barryvdh/laravel-ide-helper
        ```
    - Laravel Fortify
        ```shell
        composer require laravel/fortify
        ```
