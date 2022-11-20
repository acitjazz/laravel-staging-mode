# Laravel Staging Mode


## Installation

Via Composer

``` bash
$ composer require acitjazz/laravelstagingmode
```

## Usage

Change Cache driver to redis
``` bash
CACHE_DRIVER=redis
REDIS_CLIENT=predis
```
Publish configuration with:

``` bash
php artisan vendor:publish --tag=acitjazz-laravelstagingmode.config
php artisan vendor:publish --tag=acitjazz-laravelstagingmode.views
php artisan vendor:publish --tag=acitjazz-acitjazz-laravelstagingmode.middleware
```



## Credits

- [Acit Jazz][https://github.com/acitjazz]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/acitjazz/laravelstagingmode.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/acitjazz/laravelstagingmode.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/acitjazz/laravelstagingmode/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/acitjazz/laravelstagingmode
[link-downloads]: https://packagist.org/packages/acitjazz/laravelstagingmode
[link-travis]: https://travis-ci.org/acitjazz/laravelstagingmode
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/acitjazz
[link-contributors]: ../../contributors
