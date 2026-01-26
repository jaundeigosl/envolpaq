<?php 

$esLocal = true; 

if ($esLocal) {
    define('BASE_URL', 'http://localhost/envolpaq/envolpaq/');
} else {
    define('BASE_URL', 'https://www.envolpaq.com/');
}