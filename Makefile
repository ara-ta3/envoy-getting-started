PHP=$(shell which php)
VAGRANT=$(shell which vagrant)
ENVOY=./vendor/bin/envoy

init:
	@test -f composer.phar || curl -sS https://getcomposer.org/installer | $(PHP)

install:init
	$(PHP) composer.phar install

server-up:
	$(VAGRANT) up

envoy:
	$(ENVOY) run ls

