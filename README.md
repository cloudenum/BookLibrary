# BookLibrary DOT Internship 
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This repository is used for applying internship in DOT

BookLibrary is a very simple library management app built with Laravel 7 and CoreUI as admin template. 

#### Features
- 4 API endpoints
See [API documentation](https://documenter.getpostman.com/view/7499297/TzCJfpZu)
- Multi-role user
- Dynamic menu list

## Installation

``` bash

$ git clone https://github.com/cloudenum/BookLibrary.git

$ cd BookLibrary

$ composer install

$ npm install

# in your app directory
# generate laravel APP_KEY
$ php artisan key:generate

# run database migration and seed
$ php artisan migrate:refresh --seed

# generate mixing
$ npm run dev

# and repeat generate mixing
$ npm run dev
```

## Usage

``` bash
# start local server
$ php artisan serve
```

Open your browser with address: [localhost:8000](localhost:8000)

* E-mail: _admin@admin.com_
* Password: _password_

This user has roles: _user_ and _admin_
