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
    
4. Run `bin/console doctrine:schema:create` 
5. Run `bin/console countries:fetch` to fetch all countries and save them to DB
6. Run `bin/console server:run` to start Symfony's built in server
7. Send a request to `http://127.0.0.1:8000/country` to get a list of countries

