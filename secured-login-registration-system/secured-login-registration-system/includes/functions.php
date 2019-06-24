<?php

    function escape($string) {
        global $connection;
        return mysqli_real_escape_string($connection, $string);
    }

    function getToken($len) {

        $rand_str = md5(uniqid(mt_rand(), true));
        $base64_encode = base64_encode($rand_str);
        $modified_base64_encode = str_replace(array('+', '='), array('', ''), $base64_encode);
        $token = substr($modified_base64_encode, 0, $len);
        return $token;

    }


    function selectUserByToken ($token) {
        global $connection;
        $query = "SELECT user_name FROM remember_me WHERE selector = '$token' AND is_expired = 0";
        $query_con = mysqli_query($connection, $query);
        if(!$query_con) {
            die("Query Failed" . mysqli_error($connection));
        }

        $result = mysqli_fetch_assoc($query_con);
        $user_name = $result['user_name'];

        $query1 = "SELECT * FROM users WHERE user_name = '$user_name'";
        $query_con1 = mysqli_query($connection, $query1);
        if(!$query_con1) {
            die("Query Failed" . mysqli_error($connection));
        }
        
        $result1 = mysqli_fetch_assoc($query_con1);
        return $result1['first_name'] . " " . $result1['last_name'];
    }


    function isAlreadyLoggedIn() {
        global $connection;
        date_default_timezone_set("asia/dhaka");
        $current_date = date("Y-m-d H:i:s");
        if(isset($_COOKIE['_ucv_'])) {
            $selector = escape(base64_decode($_COOKIE['_ucv_']));

            $query = "SELECT * FROM remember_me WHERE selector = '$selector' AND is_expired = 0";
            $query_con = mysqli_query($connection, $query);
            if(!$query_con) {
                die("Query Failed" . mysqli_error($connection));
            }
            $result = mysqli_fetch_assoc($query_con);
            if(mysqli_num_rows($query_con) == 1) {
                $expire_date = $result['expire_date'];

                if($expire_date >= $current_date) {
                    $name = selectUserByToken ($selector);
                    $_SESSION['name'] = $name;
                    return true;
                }
            }
        }

    }


   