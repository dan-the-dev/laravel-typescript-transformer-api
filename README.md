# A set of transformers for spatie/laravel-typescript-transformer

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

You can install the package via composer:

```bash
composer require dinhdjj/laravel-typescript-transformer-extended
```

## Requirements

    * laravel 9+
    * Php 8.1+
    * spatie/laravel-typescript-transformer: ^2.1

## Usage

Apply transformer to your `typescript-transformer.php` config file.

```php
// config/typescript-transformer.php

return [
    // ...
    'transformers' => [
        \Dinhdjj\TypescriptTransformerExtended\ModelTransformer::class,
        \Dinhdjj\TypescriptTransformerExtended\EnumTransformer::class,

        // ...
    ],
];
```

## The effect of transformers

The transformer to generate the typescript for laravel model. It require connect to database on generate.

```php
\Dinhdjj\TypescriptTransformerExtended\ModelTransformer::class
```

The transformer to generate the typescript for native php enum.

```php
\Dinhdjj\TypescriptTransformerExtended\EnumTransformer::class
```

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
