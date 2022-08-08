# Josh Colvin Laravel Portfolio CMS

This repository is copy of the simple [PHP/Laravel CMS](https://github.com/codeadamca/php-cms-laravel) except the CMS views have been converted from vanilla PHP to Blade.

A few notes regarding the CMS:

The CMS uses the public storage driver, make sure to update your .env file to:

```php
FILESYSTEM_DRIVER=public
```

The database setup includes migrations and seeding. Run the following command to initialize the database:

```
php artisan migrate:refresh --seed
```

All user acocunts will have the default password of "password".

## Notes
I (Josh Colvin) have worked on this project alone and the work for the laravel project cms is solely done by me