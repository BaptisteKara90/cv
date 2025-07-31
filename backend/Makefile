PHP_CONTAINER=php

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