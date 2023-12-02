<?php
session_start();
    print($_COOKIE);
    print($_SESSION);
// Hapus cookie remember_me
// if(isset($_COOKIE['remember_me'])){
//     unset($_COOKIE['remember_me']);
//     setcookie('remember_me', '', time() - 3600, "/");
// }
//hapus cookie
    setcookie('username', '', time() - 3600);
    setcookie('password', '', time() - 3600);
// Hapus data session
    session_unset();
    session_destroy();
// ?>
