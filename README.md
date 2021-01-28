# CIVP

Calendrier dynamique

## Installation

```
git clone git@github:24eme/CIVP
cd CIVP
composer install && npm install
cp .env.example .env
php artisan key:generate
# modifier le .env avec les informations de DB
php artisan migrate
```

## License
AGPL
