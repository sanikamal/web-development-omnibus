<?php

    $pass = "secret123";

    $hash = password_hash($pass, PASSWORD_BCRYPT, ['cost'=>10]);
    // echo $hash;

    

    if(password_verify('secret123', $hash)) {
        echo "Password matched";
    } else {
        echo "Password dosen't matched";
    }