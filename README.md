# phpMVCsimple v1.1
# 

by Aysad Kozanoglu | email: aysadx@gmail.com | web: http://onweb.pe.hu


Created for HLS Panel

### MVC Overview ###
```
class
 |- dbconn.php
controllers
 |- pages_controller.php
views
 | - pages
 |   |- error.php
 |   |- home.php
 |-layout.php
index.php
config.php
routes.php
```

## DB Connection ##
Örnekler:

$DB = new DBPDO();


$DB->execute("UPDATE customers SET email = 'eposta@domain.com' WHERE username = 'xyz123'");

$DB->execute("UPDATE customers SET email = ? WHERE username = ?", array('eposta@domain.com', 'xyz123'));

$user = $DB->fetch("SELECT * FROM users WHERE id = ?", $id); // $id=1234567890

$users = $DB->fetchAll("SELECT * FROM users");

    output:
    --------
      [0] => Array
    (
        [id] => 1
        [name] => hasan
    )

    [1] => Array
    (
        [id] => 2
        [name] => tasan
    )

    [2] => Array
    (
        [id] => 3
        [name] => basan
    )


$users = $DB->fetchAll("SELECT * FROM users", null, 'name');

    output:
    -------
    [hasan] => Array
    (
        [id] => 1
        [name] => hasan
    )

    [tasan] => Array
    (
        [id] => 2
        [name] => tasan
    )

    [basan] => Array
    (
        [id] => 3
        [name] => basan
    )
// direk kontrol 

if( isset ( $users[$raw_data['user_name']] ) ) { //Do something }

// Son eklenen id 

$DB->lastInsertId();