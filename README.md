# Mailbox API

A basic mailbox API built on top of Laravel, in which the provided messages are listed. Each message can be marked as read and you can archive single messages.

# Configuration

After we clone the repository and configure database in .env file, we've run those Commands:

1. composer update
    • So that we make sure that all dependencies including 'l5-swagger' library installed.

2. php artisan migrate --seed
    •	That should migrate 'messages' table in addition to default laravel tables.
    • Then MessageTableSeeder runs and feeds the 'messages' table from Json file located in /database/data.

3. php artisan vendor:publish
    • We may choose the 'l5-swagger' library to be published

4. php artisan l5-swagger:generate
    • That should generate Swagger API docs here: {base_url}/api/v1/docs

5. ./vendor/bin/phpunit
    • As I used Laravel's built-in integration with PHPUnit You'll see MessageTest class to be run.
