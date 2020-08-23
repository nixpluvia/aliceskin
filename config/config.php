<?php
define("DB_HOST", "localhost");
define("DB_ID","root");
define("DB_PW","");
define("DB_NAME","aliceSkin");


if ( isset($config) == false ) {
    $config = [];
}


$config['dbConn'] = mysqli_connect(DB_HOST,DB_ID,DB_PW,DB_NAME) or die ("DB CONNECTION ERROR");


$config['siteName'] = '앨리스의원';
?>