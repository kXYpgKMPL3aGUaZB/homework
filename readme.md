## Installation

Clone project
```
$ git clone [url]
```

Run commands
```
$ docker-compose build
$ docker-compose up -d
$ docker-compose exec web cp .env.docker /var/www/.env
$ docker-compose exec web php artisan key:generate
$ docker-compose exec web php artisan optimize
$ docker-compose exec web php artisan migrate:fresh --seed
$ docker-compose exec web service cron start
```

If config got cached
```
$ docker-compose exec web php artisan config:clear
```

Stop docker
```
$ docker-compose stop
```
