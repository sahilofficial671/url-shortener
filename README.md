# URL Shortener
![https://github.com/sahilofficial671/url-shortener/actions?query=workflow%3ABuild"](https://github.com/sahilofficial671/url-shortener/actions/workflows/build.yml/badge.svg)

## Introduction
URL Shortener System comes with:
- Authenticated way to Shorten a full lenght URL path after domain to 6 digit string.
```
Actual URL: https://www.google.com/search?q=hello+world&sxsrf=ALeKk01kLVVuScZNI1CurW0px6zRWtxvaw%3A1621055778102&source=hp&ei=IlmfYOWsA7KcmgfbgZbwDQ

Shortened URL: https://url-shortener.webiggle.com/u/goo234
```
- Click analytic, restrictions, redirecton.
- User friendly way to create short urls.
- Automated deployment to AWS EC2 via SSH.

## Get Started
You can use [our Hosted version](https://url-shortener.webiggle.com/).

#### Reason
It is built on `PHP` for scalable & fast developement or because i :heart: it

## Setup :memo:
### Requirements

* PHP >= 7.2.5
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* SQL
* Apache/Nginx

### Run Following Commmands & Add Configurations:

#### 1. Clone project:
`git clone https://github.com/sahilofficial671/url-shortener.git`

#### 2. Create database schema:
**Fresh:** `php artisan migrate:fresh`\
**With Sample Data** `php artisan migrate:fresh --seed`

#### 3. Add APP_URL in `.env`:
`APP_URL=http://www.website.com`
> Important: without `'/'` in end

## Run Project :rocket:
`php artisan serve`

## Further tasks to be done :memo:
- View [todo.md](https://github.com/sahilofficial671/url-shortener/blob/main/todo.md)
