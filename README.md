# Snapshot-based version history and restore for Filament resources

[![Latest Version on Packagist](https://img.shields.io/packagist/v/elvin-qulizade/filament-versions.svg?style=flat-square)](https://packagist.org/packages/elvin-qulizade/filament-versions)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/elvin-qulizade/filament-versions/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/elvin-qulizade/filament-versions/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/elvin-qulizade/filament-versions/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/elvin-qulizade/filament-versions/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/elvin-qulizade/filament-versions.svg?style=flat-square)](https://packagist.org/packages/elvin-qulizade/filament-versions)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require elvin-qulizade/filament-versions
```

> [!IMPORTANT]
> If you have not set up a custom theme and are using Filament Panels follow the instructions in the [Filament Docs](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) first.

After setting up a custom theme add the plugin's views to your theme css file or your app's css file if using the standalone packages.

```css
@source '../../../../vendor/elvin-qulizade/filament-versions/resources/**/*.blade.php';
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-versions-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-versions-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-versions-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$versions = new ElvinQulizade\Versions();
echo $versions->echoPhrase('Hello, ElvinQulizade!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## Credits

- [Elvin-Qulizade](https://github.com/Elvin-Qulizade)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
