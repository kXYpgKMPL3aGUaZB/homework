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

To check if it works, in browser open http://127.0.0.1:8080/

If config got cached
```
$ docker-compose exec web php artisan config:clear
```

After every "$ docker-compose up -d", manualy start cron
```
$ docker-compose exec web service cron start
```

Stop docker
```
$ docker-compose stop
```
