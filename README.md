# BookLibrary DOT Internship 
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This repository is used for applying internship in DOT

BookLibrary is a very simple library management app built with Laravel 7 and CoreUI as admin template. 

#### Features
- 4 API endpoints
See [API documentation](https://documenter.getpostman.com/view/7499297/TzCJfpZu)
- Multi-role user
- Dynamic menu list
- Account Authentication
- Register Account

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

---  

## Database Diagram

![Imgur](https://i.imgur.com/3DwpNsv.png)

---

## Screenshots

![Imgur](https://i.imgur.com/TTmj5hA.png)  
![Imgur](https://i.imgur.com/DbXLgsR.png)  
![Imgur](https://i.imgur.com/jgx3k54.png)  

For video [demo](https://drive.google.com/file/d/15oNWG_tK248WflrbQG_gwoa62rMvZCx-/view?usp=sharing).
