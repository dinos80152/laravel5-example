# Jobs

The Jobs directory, of course, houses the queueable jobs for your application. Jobs may be queued by your application, as well as be run synchronously within the current request lifecycle.

## Config

config/queue.php

## Write Job Class

* generate

```
php artisan make:job Test --queued
```

app/Jobs/Test.php

## Push Job To Queue

app/Http/Controllers/Controller.php

```
abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
}
```

app/Http/Controllers/QueueContronller.php

```
public function index()
{
	$this->dispatch(new Test());
}
```

## Example

### Simple Queue Job
* app\Http\Controllers\QueueController.php index()
* app\Jobs\Test.php

### Job With Model
* app\Http\Controllers\QueueController.php show()
* app\Jobs\TestWithModel.php

### Job With Request
* app\Http\Controllers\QueueController.php store()
* app\Jobs\TestWithRequest.php

### Others
* app\Http\Controllers\QueueController.php others()
* app\Jobs\TestWithOthers.php 

## Running Queue Listener

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

* set timeout (seconds each job should be allowed to run)

```
php artisan queue:listen --timeout=60
```

* sleep when no job on the queue

```
php artisan queue:listen --sleep=5
```

## Deamon Queue Listener (Recommended)

The queue:work Artisan command includes a --daemon option for forcing the queue worker to continue processing jobs without ever re-booting the framework. This results in a significant reduction of CPU usage when compared to the queue:listen command:

```
php artisan queue:work connection --daemon --sleep=3 --tries=3
```

view all of the available options.

```
php artisan help queue:work
```

Daemon queue workers do not restart the framework before processing each job. Therefore, **you should be careful to free any heavy resources before your job finishes**.

Example:
* if you are doing image manipulation with the GD library, you should free the memory with imagedestroy when you are done.

* database connection may disconnect when being used by a long-running daemon. You may use the DB::reconnect method to ensure you have a fresh connection.

Since daemon queue workers are long-lived processes, they will not pick up changes in your code without being restarted.

```
php artisan queue:restart
```

## Dealing With Failed Jobs

app/Providers/QueueServiceProvider.php

```
    public function boot()
    {
        Queue::failing(function ($connection, $job, $data) {
            // Notify team of failing job...
        });
    }

```

app/Jobs/TestExample.php

```
    public function failed()
    {
        // Called when the job is failing...
    }
```

build failed_jobs migrations

```
php artisan queue:failed-table
```

build failed_jobs table

```
php artisan migrate
```

change table name: config/queue.php


set maximum number of times a job should be attemped

```
php artisan queue:work connection-name --tries=3
```

### Retrying Failed Jobs

view all of your failed jobs

```
php artisan queue:failed
```

retry a failed job that has an ID of 5

```
php artisan queue:retry 5
```

delete a failed job

```
php artisan queue:forget 5
```

delete all of your failed jobs

```
php artisan queue:flush
```

## Reference
* [Queues@laravel.com](http://laravel.com/docs/5.1/queues)
* [Tutorial@RabbitMQ](https://www.rabbitmq.com/getstarted.html)
* [一个Laravel队列引发的报警@火丁笔记](http://huoding.com/2015/06/10/444)