# Project description

This project contains basic tasks to check junior PHP delelopers knowladge level

## Prerequests

This project requires Docker to run

## Quick start

`docker-compose up -d`
Front-end: <http://localhost:8080/>

## Start containers

`docker-compose up -d`

## Stop containers

`docker-compose stop`

## Run compose commands

`docker-compose run --rm phpcomposer bash -c "composer install"`
`docker-compose run --rm phpcomposer bash -c "composer update"`
`docker-compose run --rm phpcomposer bash -c "composer require --dev squizlabs/php_codesniffer=*"`

## Run unit tests

`docker-compose run --rm phpcomposer bash -c "/html/vendor/bin/phpunit /html/tests"`

## Run code quality check

### PhpStan

`docker-compose run --rm phpcomposer bash -c "php /html/vendor/bin/phpstan analyse -l 9 /html/src"`

### PhpCs

`docker-compose run --rm phpcomposer bash -c "php /html/vendor/bin/phpcs --standard=PSR2 /html/src"`

#### PhpCs Auto fix

`docker-compose run --rm phpcomposer bash -c "php /html/vendor/bin/phpcbf --standard=PSR2 /html/src"`
