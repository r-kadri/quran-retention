# phpcbf: PHP Code Beautifier and Fixer
phpcbf:
	-./vendor/bin/phpcbf

# phpcs: PHP CodeSniffer
phpcs:
	./vendor/bin/phpcs

# phpstan: PHP Static Analysis Tool
phpstan:
	./vendor/bin/phpstan analyse

# reset the database
db-reset:
	php bin/console doctrine:database:drop --force
	php bin/console doctrine:database:create
	php bin/console doctrine:migrations:migrate --no-interaction

# qa: Quality Assurance - phpcbf, phpcs, phpstan
qa: phpcbf phpcs phpstan

