Quick intall guide on PHP 7.3 + Apache2 + MariaDB + Linux 18.04
________________________________________________________________

Pull the repo.

Composer install.

Set the repo to www-data:www-data user.

Make sure .env is present with the proper credentials.

Make the storage repo 777 (May be a better way later)

php artisan key:generate (Generate the encrypted application key for Laravel)

documentroot needs to point to repo/public

the directory to allowoverride All to /var/www/html/repo
