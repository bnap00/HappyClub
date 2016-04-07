<?php
header("Access-Control-Allow-Origin: '*'");
header("Access-Control-Allow-Methods : 'GET, POST, OPTIONS'");
header("Access-Control-Allow-Headers : 'X-Requested-With'");
header("Access-Control-Allow-Headers : 'Content-Type, x-xsrf-token'");
header("Access-Control-Max-Age : '172800'");
header("Content-Type : 'application/json'");
echo "asd";
if($_REQUEST["function"]=="sendData"){
    echo "asdasdasd";
}
 else {
 echo "else";   
 }