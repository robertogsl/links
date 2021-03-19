#!/usr/bin/make

SHELL = /bin/sh

CURRENT_USER := $(USER)
CURRENT_UID := $(shell id -u)
CURRENT_GID := $(shell id -g)

export CURRENT_USER
export CURRENT_UID
export CURRENT_GID

type = patch
comment = Release $(type)

.PHONY: build
build:
	docker-compose build

.PHONY: up
up:
	docker-compose up -d 

.PHONY: attach
attach: up
	docker-compose exec app bash

.PHONY: install
install:
	docker-compose run --rm composer install

.PHONY: nodejs
nodejs:
	docker-compose run --rm node $(command)

.PHONY: artisan
artisan:
	docker-compose run --rm artisan $(command)

.PHONY: logs
logs:
	docker-compose logs -f --tail 100

.PHONY: stop
stop:
	docker-compose stop

.PHONY: test
test:
	docker-compose exec app vendor/bin/phpunit

.PHONY: migrate
migrate:
	docker-compose run --rm artisan migrate

.PHONY: release
release: up
	docker-compose exec app php ./RMT release --type="$(type)" --comment="$(comment)"

.PHONY: mysql-client
mysql-client: up
	docker-compose exec database mysql -psecret -u links --database links

.PHONY: style-fix
style-fix:
	docker run --rm -it -w=/app -v ${PWD}:/app oskarstark/php-cs-fixer-ga:2.17.5 --config=.php_cs.php
