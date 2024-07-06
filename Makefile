# phpcbf: PHP Code Beautifier and Fixer
phpcbf:
	-./vendor/bin/phpcbf

# phpcs: PHP CodeSniffer
phpcs:
	./vendor/bin/phpcs

# phpstan: PHP Static Analysis Tool
phpstan:
	./vendor/bin/phpstan analyse

# qa: Quality Assurance - phpcbf, phpcs, phpstan
qa: phpcbf phpcs phpstan
