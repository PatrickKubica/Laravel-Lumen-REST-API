# Laravel-Lumen-REST-API
REST API built with the Lumen framework by Laravel.

This API enables you to make GET, POST, PUT and DELETE requests for products to the API endpoint
`<your_url>/api/v1/product`.

I am using [Postman](https://www.getpostman.com/) for testing this API during development, but of couse you can also do direct curl calls. To get some example requests please check out the unit test `tests\ProductTest.php`.

## Installation
To install this project please run
```bash
composer install
```

Please make sure that you adjust the configuration in
`.env.example` and rename it to `.env` so it matches the configuration for the database that you are using.

## Tests

### CodeSniffer
[PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer) is used to check the code style of this project and is configured in
`phpcs.xml`

You can run the Code Sniffer with
```bash
vendor/bin/phpcs
```
### Unit Tests

PHPUnit tests have been added to the `tests` directory.
They are executed by running
```bash
vendor/bin/phpunit
```
