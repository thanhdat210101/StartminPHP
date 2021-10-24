<?php
require('../db/databse.class.php');


$config = [
    'host' => 'localhost',
    'user'=>'root',
    'pass'=> '123123',
    'name'=>'tmartshop-master'
];


$db = new database($config);
?>