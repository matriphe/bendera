# Bendera

[![Build](https://github.com/matriphe/bendera/actions/workflows/php.yml/badge.svg)](https://github.com/matriphe/bendera/actions/workflows/php.yml)

A Laravel package to convert country code (ISO 3166-1 alpha-2) to corresponding flag emoji.

This packages wraps [Country Flags](https://github.com/stidges/country-flags) and all limitations on that package also apply to this.

> *Bendera* means flag in Indonesian 🇮🇩.

## Installation

You can install the package via composer:

```shell
composer require matriphe/bendera
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

## License

The [MIT License (MIT)](LICENSE.txt). Please see License File for more information.