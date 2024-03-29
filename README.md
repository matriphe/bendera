# Bendera

[![Run Tests](https://github.com/matriphe/bendera/actions/workflows/run-tests.yml/badge.svg)](https://github.com/matriphe/bendera/actions/workflows/run-tests.yml)
[![Latest Stable Version](https://poser.pugx.org/matriphe/bendera/v)](//packagist.org/packages/matriphe/bendera)
[![Total Downloads](https://poser.pugx.org/matriphe/bendera/downloads)](//packagist.org/packages/matriphe/bendera)

A Laravel package to convert country code (ISO 3166-1 alpha-2) to corresponding flag emoji.

This packages wraps [Country Flags](https://github.com/stidges/country-flags) and all limitations on that package also apply to this.

> *Bendera* means flag in Indonesian 🇮🇩.

## Installation

You can install the package via composer:

### Laravel 10

```shell
composer require matriphe/bendera
```

### Laravel 9 or Older

```shell
composer require matriphe/bendera:0.3.0
```

## Configuration

It is not necessary, but if you want to add mapping, publish the config file.

```shell
php artisan vendor:publish --provider="Matriphe\Bendera\BenderaServiceProvider" --tag="bendera"
```

For example you want to map a custom country `XY` and shows it as `ID`.

```php
return [
    'aliases' => [
        'XY' => 'ID',
    ]
];
```

## Usage

You can use the Facade `Bendera` to get the emoji.

```php
Bendera::emoji('id'); // will return 🇮🇩
Bendera::emoji('en'); // will return 🇬🇧
Bendera::emoji('uk'); // will return 🇬🇧
Bendera::emoji('GB'); // will return 🇬🇧
Bendera::emoji('XYZ'); // will return null
```

For invalid country code, it will return `null`;

You can also use dependency injection style by injecting `BenderaContract` to your class.

```php
class SomeAwesomeClass 
{
    public function awesome(\Matriphe\Bendera\BenderaContract $bendera)
    {
        return $bendera->emoji('id');
    }
}
```

## Contributing

Contributions are welcome via Pull Requests on Github.

## Credits

- [Stidges](https://github.com/stidges) for his initial Country Flags package.
- [Spatie](https://github.com/spatie) for their awesome packages.

## License

The [MIT License (MIT)](LICENSE.txt). Please see License File for more information.