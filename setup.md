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

### Run Following Commmands & Add Configurations:

#### 1. Clone project:
`git clone https://github.com/sahilofficial671/URL-Hashing.git`

#### 2. Create database schema:
**Fresh:** `php artisan migrate:fresh`\
**With Sample Data** `php artisan migrate:fresh --seed`

#### 3. Add APP_URL in `.env`:
`APP_URL=http://ww.website.com`
> Important: without `'/'` in end

## Run Project :rocket:
`php artisan serve`
