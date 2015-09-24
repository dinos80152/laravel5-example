# Console

The Console directory contains all of your Artisan commands

## Artisan
```
php artisan make:console SendEmail
```

## Task Scheduling
* add below to crontab
```
* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1
```

## Reference
* [Artisan Console@larave.com](http://laravel.com/docs/5.1/artisan)