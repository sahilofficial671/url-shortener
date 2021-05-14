# URL Hashing
<a href="https://github.com/sahilofficial671/URL-Hashing/actions?query=workflow%3ABuild"><img src="https://github.com/sahilofficial671/URL-Hashing/workflows/Build/badge.svg" alt="Build Status"></a>

## Requirements

* PHP >= 7.2.5
* SQL
* Apache/Nginx
* [For futher requirements](https://github.com/sahilofficial671/URL-Hashing/blob/main/setup.md)

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
