# README

Things you may want to cover:

* Laravel version 5.3

This is Tiny Blog
by [Habibur Rahman](http://www.facebook.com/follow.hbrawnak).

## License

All source code in the [Laravel](https://laravel.com/)
is available jointly under the MIT License and the Beerware License. See
[LICENSE.md](LICENSE.md) for details.

## Getting started

To get started with the app, clone the repo:

```
$ composer update
```
Update App ID, secret and version in MainController.php from your facebook accountkit.

Next, migrate the database:

```
$ php artisan migrate
```

Then, run the seed:

```
$ php artisan db:seed
```

Finally, run the application
```
$ php artisan serve
```
