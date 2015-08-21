# Console

The Console directory contains all of your Artisan commands

## Task Scheduling
* add below to crontab
```
* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1
```