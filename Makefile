all : up up-d down queue-work test artisan composer php php-version shell tinker setup nova-user
.PHONY : all

COMPOSE_PROJECT_NAME = find-my-zero-backend
sail = export COMPOSE_PROJECT_NAME=${COMPOSE_PROJECT_NAME} && ./vendor/bin/sail

up:
	${sail} up

up-d:
	${sail} up -d

down:
	export COMPOSE_PROJECT_NAME=$COMPOSE_PROJECT_NAME
	${sail} down

queue-work:
	export COMPOSE_PROJECT_NAME=$COMPOSE_PROJECT_NAME
	${sail} artisan queue:work

test:
	export COMPOSE_PROJECT_NAME=$COMPOSE_PROJECT_NAME
	${sail} test

artisan:
	${sail} artisan $(CMD)

composer:
	${sail} composer $(CMD)

php:
	${sail} php $(CMD)

php-version:
	${sail} php --version

shell:
	${sail} shell

tinker:
	${sail} tinker

seed:
	${sail} artisan db:seed

nova-user:
	${sail} artisan nova:user

setup:
	docker run --rm \
		-v "$(pwd)":/opt \
		-w /opt \
		laravelsail/php80-composer:latest \
		bash -c "composer install"
