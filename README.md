<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About this Project

This demo a SPA CRUD example using the following features:

- Laravel9 + Sail with default Docker development environment.
- VueJS3 + Composition API to create SPA CRUD
- TDD with index, show, store, update and destroy actions
- Rule validations using Custom Request (RealEstateRequest)
- Factory and database seeding.
- Custom config file to validate ISO 3166-Alpha2 array

## FAQ
- How can i run Laravel9 + Sail on my local? 
If you are going to use Sail to run this project on your local i strongly suggest you to use the composer docker image to install dependencies after you clone this repository.

- How can i run commands using Sail?
You have to add the word sail instead php in the most common commands, for example php artisan db:seed => sail artisan db:seed.

- How can i run VueJS on my local?
You need npm and node installed on your local, then you can run the command npm install and then npm run watch, if you are using Laravel Sail you should instead run sail npm install and sail npm run watch

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
