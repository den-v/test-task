Yii 2 Basic Project Template
============================


INSTALLATION(please install composer before)
--------------------------------------------
git clone https://github.com/den-v/test-task.git
cd test-task
php composer.phar global require "fxp/composer-asset-plugin:~1.0.0"
php composer.phar update
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTE:** Yii won't create the database for you, this has to be done manually before you can access it.

Also check and edit the other files in the `config/` directory to customize your application.


CREATE TABLES AND LOAD DATA
---------------------------

yii migrate