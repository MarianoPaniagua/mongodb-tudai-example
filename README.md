Para poder hacer andar este ejemplo en local se necesitaran algunas cosas:

1--> Instalar MongoDB  https://www.mongodb.com/try/download/community 

2--> Instalar MongoCompass. Este es un manejador de bases de datos, facilitará la creación de las bd y colecciones.

3--> Crear una base de datos y una colección.

4--> Descargar la extensión de mongodb para php y ubicarlo en la carpeta /xampp/php/ext/.  https://pecl.php.net/package/mongodb/1.7.5

5--> Declarar la extensión en el archivo /xampp/php/php.ini. ("extension = php_mongodb")

7--> Instalar Composer. Es un manejador de paquetes de PHP que nos servirá para instalar las librerías de MongoDB que usará PHP. https://getcomposer.org/download/

8--> Ejecutar el siguiente comando: "composer require mongodb/mongodb"