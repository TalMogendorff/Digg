<?php

session_start();

echo '<pre>';

print_r($_SESSION);

echo '<hr>';

if(isset($_SESSION['user_name'])){

    echo $_SESSION['user_name'];

}