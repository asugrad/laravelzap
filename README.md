# Laravel Zap!

![alt text](https://github.com/asugrad/laravelzap/blob/master/resources/assets/img/browser.png "Laravel Zap")

[Laravel Zap Home Page](https://laravelzap.com)

## Installation
Clone or download the repository.
- Go to your terminal and `cd` to the root of the site.
- Run `yarn install`
- Run `composer install`
- Change the line `var localsite = 'YOURLOCALDEV';` in your gulpfile.js
- Run `gulp`
- If you are using Laravel Valet, you are done! Just browse to the site.
- If you have issues getting the site running locally, make sure you have a .env file created.
- Then run `php artisan key:generate`
- `php artisan storage:link`
- `php artisan zap:build`
- Hopefully, that will get the site going for you.

- Create views, models, and controllers just like you usually do, then run `php artisan zap:build` to regenerate the site.

## About Zap
Working on the documentation but you can see how the site [Laravel Zap](https://laravelzap.com) works.
This is the code that site is running on.

## License

Laravel Zap is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
