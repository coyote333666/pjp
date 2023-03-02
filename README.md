# pjp - PHP Jquery UI portal

Client and server side library of simple functions in plain PHP and JQUERY UI for managing a portal with portlets position and state saved in a postgresql database in real time.

![Screenshot 2022-04-09 13-16-37](https://user-images.githubusercontent.com/24400013/162584608-de20efb4-af69-4ae2-b050-d435cbf78104.png)

Requirements
------------

  * PHP 7.2.9 or higher;
  * pdo_pgsql PHP extension enabled in php.ini;
  * Postgresql standalone OR Docker-compose

Installation
------------

Verify that you have installed, depending on your environment, [docker-compose][1] OR [postgresql][2], npm, bower and nodejs..

Verify that you have PHP installed : `sudo apt-get install php` on linux or, for windows, use php already included in [xampp][3].
If you have Windows, do not forget to indicate in the environment variable PATH, 
the path to access php.exe (for example, C:\xampp\php).

run this command:

```bash
$ sudo su postgres
$ psql
postgres$ CREATE DATABASE test
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    CONNECTION LIMIT = -1;
postgres$ CREATE USER test WITH
  LOGIN
  NOSUPERUSER
  INHERIT
  NOCREATEDB
  NOCREATEROLE
  NOREPLICATION;
postgres$ ALTER ROLE test with password 'test';
postgres$ ALTER USER test with password 'test';
postgres$ REVOKE ALL ON DATABASE test FROM public;
postgres$ GRANT ALL ON DATABASE test TO test;        
postgres$ exit
$ sudo adduser test
$ sudo su test
$ cd /home/test
$ git clone https://github.com/coyote333666/pjp pjp
$ cd pjp/
$ psql -f script.sql -U test
(password test)
```
Install dependancies:

```bash
$ npm install jquery
```

Then access the application in your browser at the given URL (localhost/pjp).

[1]: https://docs.docker.com/compose/install/
[2]: https://www.postgresql.org/
[3]: https://www.apachefriends.org/index.html
