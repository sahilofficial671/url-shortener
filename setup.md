# Setup :memo:

## Requirements

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

#### Create database schema:
`php artisan migrate`

#### Add APP_URL in `.env`:
`APP_URL=http://ww.website.com` 
> Important: without `'/'` in end

## Run :rocket:
`php artisan serve`
