<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/agustinmejia/farmacia/master/public/img/icon.png" width="150"></a></p> -->

# Coteautri

## Requisitos
- php ^7.3|^8.0
- mysql
- Extensiones de php (mbstring, intl, dom, gd, xml, zip, mbstring, mysql)

## Instalación
```
composer install
cp .env.example .env
php artisan prestamos:install
chmod -R 777 storage bootstrap/cache
```