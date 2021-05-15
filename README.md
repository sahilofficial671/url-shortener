# URL Hashing
![https://github.com/sahilofficial671/URL-Hashing/actions?query=workflow%3ABuild"](https://github.com/sahilofficial671/URL-Hashing/actions/workflows/build.yml/badge.svg)

## Introduction
URL Hashing System comes with:
- Authenticated way to Shorten a full lenght URL path after domain to 6 digit string.
- Click analytic, restrictions, redirecton.
- User friendly way to create hashed urls.
- Automated deploy pipeline via SSH.

## Get Started
You can use [our Hosted version](https://url-hasher.webiggle.com/).

## Requirements
If you want to host it yourself, you will need:
- PHP >= 7.2.5
- HTTP server with PHP support (eg: Apache, Nginx, Caddy)
- Composer
- MySQL
- [For futher requirements](https://github.com/sahilofficial671/URL-Hashing/blob/main/setup.md)

#### Reason
It is built on `PHP` for scalable & fast developement or because i :heart: it

## Setup :memo:

#### Create database schema:
`php artisan migrate`

#### Add APP_URL in `.env`:
`APP_URL=http://ww.website.com` 
> Important: without `'/'` in end

## Run :rocket:
`php artisan serve`
