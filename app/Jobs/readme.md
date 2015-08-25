# Jobs

The Jobs directory, of course, houses the queueable jobs for your application. Jobs may be queued by your application, as well as be run synchronously within the current request lifecycle.

## Artisan

* generate

```
php artisan make:job SendReminderEmail --queued
```

* listen

```
php artisan queue:listen
```

* listen specify connection

```
php artisan queue:listen connection
```

* set priorities, high will always be processed first

```
php artisan queue:listen --queue=high,low
```

* set timeout

```
php artisan queue:listen --timeout=60
```1

* sleep when no job on the queue

```
php artisan queue:listen --sleep=5
```

## Deamon Queue Listener (TODO)


## Reference
* [Queues@laravel.com](http://laravel.com/docs/5.1/queues)