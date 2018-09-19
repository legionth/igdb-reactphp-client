# igdb-reactphp

Asynchrounous event-event driven implementation of the
[IGDB API](https://api.igdb.com/) on top of ReactPHP.

**Table of Contents**

## Usage

This example will create an client that will connect
to the official IGDB API](https://api.igdb.com/).

An API call to [achievements](https://igdb.github.io/api/endpoints/achievement/)
is used here.

```php
require __DIR__ . '/vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

$httpClient = new \Legionth\React\Http\Client($loop);

$apiKey = '<enter-your-api-key>';

$igdbClient = new \Legionth\React\IGDB\IgdbClient($apiKey, $httpClient);

$promise = $igdbClient->getAchievements(array(1440, 5000));

$promise->then(function (array $array){
    echo "Array: " . json_encode($array, JSON_PRETTY_PRINT) . 'LOL';
}, function (\Exception $exception) {
    echo $exception->getMessage();
});
```

All methods in `IgdbClient` will return a
[ReactPHP Promise](https://github.com/reactphp/promise)
which will result in an array containing all
information the response of the API.
The promise is used to work highly asynchronous
so multiple calls can be made asynchronous without
fearing blocking code. 

## General 

### API Key

To use this library you MUST create an account on 
[IGDB API](https://api.igdb.com/).
This API MUST be passed to the library to work.

### Limitation of Requests

Please consider there MAY be a limitation of requests
to [IGDB API](https://api.igdb.com/).
Check the documentation to increase the calls to API.

## Supported Endpoints

Currently there are several ebdpoints that are supported
in this library.

```
    Achievements
    Character
    Collection
    Company
    Credits
    External Review
    External Review Source
    Feed
    Franchise
    Game
    Game engine
    Game mode
    Genre
    Keyword
    Page
    Person
    Platform
    Play Times
    Player Perspective
    Pulse
    Pulse Group
    Pulse Source
    Release date
    Review
    Theme
    Title
    User Profile
    Versions
```

If any endpoint is missing or has changed,
feel free to fill a pull request to help out.

## Install

[New to Composer?](https://getcomposer.org/doc/00-intro.md)

This will install the latest supported version:

```bash
$ composer require legionth/igdb-client-reactphp:^0.1
```

## License

MIT
