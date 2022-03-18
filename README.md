# php-project
#### The project developed by using Php and PostgreSQL. This is application to save personal TODO list.
#### Installation
    -> Php 7.x 
    -> PostgreSQL
    -> php localhost servers (ex-XAMPP)
       ->php.ini modify and remove char ';' before extension 
          ->extension=pdo_mysql
          ->extension=pdo_pgsql
##### Postgresql information stored in php-project\test-todo\api\library\dbcon.php only needed to change 
    ->$host        = "127.0.0.1"; // host address
    ->$port        = "5432"; // port number
    ->$dbname      = "postgres";  //database name
    ->$credentials = ['postgres','postgres']; //['username','password']
### Tested result https://www.getpostman.com/collections/e1d554e5351bba76e812
