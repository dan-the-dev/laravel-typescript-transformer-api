# Extension of `spatie/laravel-typescript-transformer` with improvements to work with API Requests and Responses

This package is an extension of `spatie/laravel-typescript-transformer` that offers two pairs of Collector and Transformer
that can be used with `spatie/laravel-typescript-transformer` via the command `php artisan typescript:transform`:
- the Request set allow you to transform all sublasses of Illuminate\Http\Request or Illuminate\Foundation\Http\FormRequest - to achieve this, you need:
    - the RequestCollector (\Danthedev\LaravelTypescriptTransformerApi\Collectors\RequestCollector)
    - the RequestTransformer (\Danthedev\LaravelTypescriptTransformerApi\Transformers\RequestTransformer)
- the Response set allow you to transform all sublasses of Illuminate\Http\Response - to achieve this, you need:
    - the ResponseCollector (\Danthedev\LaravelTypescriptTransformerApi\Collectors\ResponseCollector)
    - the ResponseTransformer (\Danthedev\LaravelTypescriptTransformerApi\Transformers\ResponseTransformer)

You can install the package via composer:

```bash
composer require danthedev/laravel-typescript-transformer-api
```

## Requirements

    * laravel 9+
    * Php 8.1+
    * spatie/laravel-typescript-transformer: ^2.1 [https://github.com/spatie/laravel-typescript-transformer]

## Usage

Build your Api extending Request and Response Illumante classes, then automatically transform them in Typescript types.

```php

```

Apply collectors and transformers to your `typescript-transformer.php` config file
(we suggest you put them before `spatie/laravel-typescript-transformer` collectors and transformars - order is not important between our classes, instead).

```php
// config/typescript-transformer.php

return [
    // ...
    'collectors' => [
        \Danthedev\LaravelTypescriptTransformerApi\Collectors\RequestCollector::class,
        \Danthedev\LaravelTypescriptTransformerApi\Collectors\ResponseCollector::class,

        // ...
    ],
    'transformers' => [
        \Danthedev\LaravelTypescriptTransformerApi\Transformers\RequestTransformer::class,
        \Danthedev\LaravelTypescriptTransformerApi\Transformers\ResponseTransformer::class,

        // ...
    ],
    // ...
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
