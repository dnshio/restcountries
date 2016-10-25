# Quick Start
1. Clone this repository
2. From root, run `composer install`
3. Add the correct database configurations to `app/config/parameters.yml` 
    ```
    database_host: 127.0.0.1
    database_port: 
    database_name: 
    database_user: 
    database_password: 
    ```
4. Run `bin/console countries:fetch` to fetch all countries and save them to DB
