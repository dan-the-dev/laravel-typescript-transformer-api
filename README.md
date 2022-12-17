# Extension of `spatie/laravel-typescript-transformer` with improvements to work with API Requests and Responses

This package is an extension of `spatie/laravel-typescript-transformer` that offers a Collector that can be used
with `spatie/laravel-typescript-transformer` via the command `php artisan typescript:transform`; 
the RequestCollector imports all classes that extends Illuminate\Http\Request or Illuminate\Foundation\Http\FormRequest
and transform them into Typescript type.

You can install the package via composer:

```bash
composer require dan-the-dev/laravel-typescript-transformer-api
```

## Requirements

    * laravel 9+
    * Php 8.1+
    * spatie/laravel-typescript-transformer: ^2.1

## Usage

Build your Api using our traits to signal Request and Response objects.

```php

```

Apply collector to your `typescript-transformer.php` config file.

```php
// config/typescript-transformer.php

return [
    // ...
    'collectors' => [
        \Danthedev\LaravelTypescriptTransformerApi\Collectors\RequestCollector::class,

        // ...
    ],
];
```

Run command `php artisan typescript:transform` to transform to Typescript types all your Api Request and Response objects.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [dan-the-dev](https://github.com/dan-the-dev)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
