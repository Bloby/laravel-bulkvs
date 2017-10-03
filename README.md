laravel-bulkvs
======

**NOTE:** This package is no longer in active development. Feel free to fork and extend it as needed.

A simple Laravel interface for interacting with the Bulkvs API.


# Installation
To install the package, simply add the following to your Laravel installation's `composer.json` file:

```json
"require": {
	"laravel/framework": "5.*",
	"blob/laravel-bulkvs": "dev-master"
},
```

Run `composer update` to pull in the files.

Then, add the following **Service Provider** to your `providers` array in your `config/app.php` file:

```php
'providers' => array(
    ...
    Bulkvs\Providers\BulkvsServiceProvider::class,
);
```

From the command-line run:
`php artisan vendor:publish`

# Configuration

Open `config/bulkvs.php` and configure the api endpoint and credentials:

```php
return [
    // WSDL URL
    'url'		 =>	'https://portal.bulkvs.com/api?wsdl',

    // API KEY
    'api_key'    =>	'key',

    // API SECRET
    'api_secret' =>	'secret',

    //api secret is md5
    'is_md5'     =>	false,
];
```

# Usage
```php
$details = Bulkvs::e911validateAddress($state, $city, $zip, $address1, $address2);
```
