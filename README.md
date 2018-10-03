<h3>Visitors Login System</h3>
===============================
<br>
Step 1. Need to install first :
<pre>
    a. git (https://git-scm.com/downloads)
    b. composer (https://getcomposer.org/download/)
</pre>
Step 2. Pull from your directory
<pre>
cd <\path\to\your\directory>
git init
git remote add origin https://github.com/dnovencido/vls-v1.git
git pull origin master
</pre>
Step 3. Setup your database in common\config\main-local.php
<pre>
'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=tbl_vls',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
</pre>
Step 4. Update vendors
<pre>
composer update
</pre>
Step 5. Create your own database and name it as "db_vls" then run
<pre>
    a. php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
    b. php yii migrate/up --migrationPath=@yii/rbac/migrations
    c. php yii migrate
    
</pre>