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


#The MIT License (MIT)#

Copyright (c) <2016> <copyright Aysad Kozanoglu>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

