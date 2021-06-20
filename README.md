# Create project using laravel installer
    1. laravel new hotel-management
    2. cd hotel-management
    3. composer require laravel/ui
    4. php artisan ui bootstrap --auth
    5. npm install && npm run dev
# Setup project
    ## Setup database
    1. Name: hotel_management

    ## Edit server url
    1. Hosts File in the computer
       Directory: C:\Windows\System32\drivers\etc
       File: hosts
       Added: 
       /*
            127.0.0.1 hotel-management.test
       */
    2. Xampp File
        Directory: C:\xampp\apache\conf\extra
        File: httpd-vhosts.conf
        Added
        /*
            <VirtualHost *:80>
                DocumentRoot "C:/xampp/htdocs/uog-thesis-projects/hotel-management/public"
                ServerName hotel-management.test
            </VirtualHost>
        */

