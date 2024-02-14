start-local:
	make env-local \
	&& docker-compose -f docker-compose.local.yml up -d \
	&& sleep 10 \
	&& docker exec -it app composer install \
	&& docker exec -it app php artisan migrate --force \
	&& docker exec -it app php artisan key:generate \
	&& docker exec -it app php artisan route:cache \
	&& make test \
	&& make chmod

env-local:
	cp .env.local .env

chmod:
	docker exec -it app chmod -R 777 vendor \
	&& docker exec -it app chmod -R 777 storage

restart:
	docker-compose -f docker-compose.local.yml down \
	&& docker-compose -f docker-compose.local.yml up -d \
	&& docker exec -it app php artisan migrate

build:
	docker-compose -f docker-compose.local.yml down \
	&& docker-compose -f docker-compose.local.yml up --build

enter:
	docker exec -it app bash

optimize:
	docker exec -it app php artisan optimize

test:
	docker exec -it app php artisan test
