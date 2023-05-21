default: run

init:
	docker-compose up -d
	#docker-compose exec -u www-data api composer install
	docker-compose exec -u www-data api php bin/console doctrine:migrations:migrate --no-interaction
	#docker-compose exec -u www-data ui yarn install
	#docker-compose exec -u www-data ui yarn encore dev

run:
	docker-compose up -d

stop:
	docker-compose down

watch:
	docker-compose exec -u ui yarn encore dev --watch

composer:
	docker-compose exec -u www-data api composer install

cache:
	docker-compose exec -u www-data api php bin/console cache:clear

bash:
	docker-compose exec -it api bash

remove:
	docker image rm symfonytest-ui

mysql:
	 docker exec -it symfonytest-mysql-1 mysql -uuser -p

phpstorm:
	sudo ~/.local/share/JetBrains/Toolbox/apps/PhpStorm/ch-0/231.9011.38/bin/phpstorm.sh

new_migration:
	docker-compose exec api php bin/console doctrine:migrations:generate

migrate:
	docker-compose exec api php bin/console doctrine:migrations:migrate
