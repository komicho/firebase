# Komicho Firebase
You can send notifications with ease

### Install via composer

Add orm to composer.json configuration file.
```
$ composer require komicho/firebase
```

And update the composer
```
$ composer update
```
    
## code
```php
require 'vendor/autoload.php';

use komicho\firebase;

$firebase = new firebase('api_access_key');

echo $firebase
    ->to('Token')
    ->notification([
        'title' => 'kom',
        'body' => 'komicho :)'
    ])
    ->data([ ... ])
    ->send();
```
"# firebase" 
