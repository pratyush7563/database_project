<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'users');
   define('DB_PASSWORD', 'users123');
   define('DB_DATABASE', 'songs');
   $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   //echo "hi"
?>	