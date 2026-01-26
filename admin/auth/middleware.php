<?php
session_start();

function check_auth()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../admin/login.php');
        exit;
    }
}
?>