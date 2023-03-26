# pjp - PHP Jquery UI portal

Client and server side library of simple functions in plain PHP and JQUERY UI for managing a portal with portlets position and state saved in a postgresql database in real time.

![image](https://user-images.githubusercontent.com/24400013/227750278-cf54e743-deba-4a1e-a370-8b06bc734c99.png)

Requirements
------------

  * PHP 7.2.9 or higher;
  * pdo_pgsql PHP extension enabled in php.ini;
  * Postgresql standalone OR Docker-compose

Installation
------------

Verify that you have installed, depending on your environment, [docker-compose][1] OR [postgresql][2], [npm][4], [yarn][5] and [nodejs][6] and [git][7].

Verify that you have PHP installed : `sudo apt-get install php` on linux or, for windows, use php already included in [xampp][3].
If you have Windows, do not forget to indicate in the environment variable PATH, 
the path to access php.exe (for example, C:\xampp\php).

run these linux commands (password : test):

```bash
sudo su postgres
psql
CREATE DATABASE test
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    CONNECTION LIMIT = -1;
CREATE USER test WITH
  LOGIN
  NOSUPERUSER
  INHERIT
  NOCREATEDB
  NOCREATEROLE
  NOREPLICATION;
ALTER ROLE test with password 'test';
ALTER USER test with password 'test';
REVOKE ALL ON DATABASE test FROM public;
GRANT ALL ON DATABASE test TO test;        
exit
cd /var/www/html
sudo git clone https://github.com/coyote333666/pjp pjp
cd pjp/
psql -f script.sql -U test
```
Install dependencies:

```bash
cd /var/www/html
sudo yarn add jquery-ui
```

Then access the application in your browser at the given URL (localhost/pjp).

[1]: https://docs.docker.com/compose/install/
[2]: https://www.postgresql.org/
[3]: https://www.apachefriends.org/index.html
[4]: https://www.npmjs.com/
[5]: https://yarnpkg.com/
[6]: https://nodejs.org/en/
[7]: https://git-scm.com/
