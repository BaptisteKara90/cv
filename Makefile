PHP_CONTAINER=symfony-php
DOCKER_COMPOSE=docker-compose -f docker-compose.yml

start:
	$(DOCKER_COMPOSE) up -d

stop:
	$(DOCKER_COMPOSE) down

build:
	$(DOCKER_COMPOSE) up -d --build

install-backend:
	$(DOCKER_COMPOSE) run --rm $(PHP_CONTAINER) sh -c "\
		cd /var/www/html && \
		composer install \
	"

console:
	docker-compose exec $(PHP_CONTAINER) php bin/console

entity:
	docker-compose exec $(PHP_CONTAINER) php bin/console make:entity

migrate:
	docker-compose exec $(PHP_CONTAINER) php bin/console doctrine:migrations:migrate

migration:
	docker-compose exec $(PHP_CONTAINER) php bin/console make:migration

schema-update:
	docker-compose exec $(PHP_CONTAINER) php bin/console doctrine:schema:update --force

router:
	docker-compose exec $(PHP_CONTAINER) php bin/console debug:router