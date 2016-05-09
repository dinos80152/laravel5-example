# Events

## Observer Pattern

## Implementation

The Events directory, as you might expect, houses event classes. Of course, using classes to represent events is not required; however, if you choose to use them, this directory is the default location they will be created by the Artisan command line.

## Registering Events/Listeners

```php
protected $listen = [
    'App\Events\PodcastWasPurchased' => [
        'App\Listeners\EmailPurchaseConfirmation',
    ],
];
```

## Generating Event / Listener Classes

generate code by you register in app/Providers/EventServiceProvider.php listen block

```
php artisan event:generate
```

## Defining Events

An event class is simply a data container which holds the information related to the event.

## Defining Listeners

```
app\Listeners
```

## Firing Events

```
app\Http\Controllers\EventController
```

## Event Subscribers

Event subscribers are classes that may subscribe to multiple events from within the class itself

### Implement

```
app\Listeners\UserEventListener
```

### Registering An Event Subscriber

```
app\Providers\EventServiceProvider
```


# Broadcasting Events

web sockets

## Configuration

```
config/broadcasting.php
```

## Require

* predis
* queue listener

## Flow

Controller->fire event->queue

## WebSocket

### Server Solution

* [Socket.io](http://socket.io/)
* [Ratchet](http://socketo.me/)

## WAMP

### Redis pub/sub



## Reference
* [Events@larave.com](http://laravel.com/docs/5.1/events)