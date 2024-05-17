<?php 
    if (isset($_COOKIE['userlogin'])) {
        unset($_COOKIE['userlogin']);
        setcookie('userlogin', '', -1, '/');
        unset($_COOKIE['userID']);
        setcookie('userID', '', -1, '/');
        return true;
    } else {
        return false;
    }

?>