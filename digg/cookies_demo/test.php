<?php

echo '<pre>';
print_r($_COOKIE);

echo '<hr>';

if( isset($_COOKIE['duration'])){

    echo $_COOKIE['duration'];

}