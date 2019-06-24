<?php $currentPage = "Sign UP"; ?>
<?php require_once("includes/header.php"); ?>

<div class="container">
    <div class="content">
        <h2 class="heading"><?php echo $currentPage ?></h2>
        <?php

            // //google recaptcha
            $public_key="6LfxAqkUAAAAAA0U84nwovER7As8yNsW-dJ7qZOZ";
            $private_key="6LfxAqkUAAAAAIDnDwfPBrDrkcxDWiHuKQsUnB0m";
            $url = "https://www.google.com/recaptcha/api/siteverify";

                if(isset($_POST['sign-up'])) {

                    //Google recaptcha
                    $response_key = $_POST['g-recaptcha-response'];

                    //https://www.google.com/recaptcha/api/siteverify?secret=$private_key&response=$response_key&remoteip=currentScriptIpAddress
                    $response = file_get_contents($url . "?secret=" . $private_key . "&response=" . $response_key . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                    $response = json_decode($response);
                    // print_r($response);
                    if(!($response->success == 1)) {
                        $errCaptcha = "Wrong captcha";
                    }



                    $first_name     = escape($_POST['first_name']);
                    $last_name      = escape($_POST['last_name']);
                    $user_name      = escape($_POST['user_name']);
                    $user_email     = escape($_POST['user_email']);
                    $user_pass      = escape($_POST['user_password']);
                    $user_con_pass  = escape($_POST['user_confirm_password']);

                    // first_name validation
                    $pattern_fn="/^[a-zA-Z]{3,12}$/";
                    if(!preg_match($pattern_fn,$first_name)){
                        $errfn="Must be at least 3 character long, letter and space allowed";
                    }

                    //last name validation
                    $pattern_ln = "/^[a-zA-Z ]{3,12}$/";
                    if(!preg_match($pattern_ln, $last_name)) {
                        $errln = "Must be at lest 3 character long, letter and space allowed";
                    }
                    //user name validation
                    //at lest 3 character, letter, numeber and underscore allowed
                    $pattern_un = "/^[a-zA-Z0-9_]{3,16}$/";
                    if(!preg_match($pattern_un, $user_name)) {
                        $errun = "Must be at lest 3 character long, letter, number and underscore allowed";
                    }else {
                        $query = "SELECT * FROM users WHERE user_name = '$user_name'";
                        $query_con = mysqli_query($connection, $query);
                        if(!$query_con) {
                            die("Query Failed" . mysqli_error($connection));
                        }
                        $count = mysqli_num_rows($query_con);
                        if($count == 1) {
                            $errun = "User name not available pick new one";
                        }
                    }
                    //email validation
                    //filter_var($user_email, FILTER_VALIDATE_EMAIL);
                    $pattern_ue = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/";
                    if(!preg_match($pattern_ue, $user_email)) {
                        $errue = "Invalid format of email";
                    }else {
                        $query = "SELECT * FROM users WHERE user_email = '$user_email'";
                        $query_con = mysqli_query($connection, $query);
                        if(!$query_con) {
                            die("Query Failed" . mysqli_error($connection));
                        }
                        $count = mysqli_num_rows($query_con);
                        if($count == 1) {
                            $errue = "Email already exists";
                        }
                    }


                    if($user_pass == $user_con_pass) {
                         //password validation
                         $pattern_up = "/^.*(?=.{4,56})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
                         if(!preg_match($pattern_up, $user_pass)) {
                             $errPass = "Must be at lest 4 character long, 1 upper case, 1 lower case letter and 1 number exist";
                         }
                    } else {
                        $errPass = "Password dosen't matched";
                    }
                    if(!isset($errfn) && !isset($errln) && !isset($errun) && !isset($errue) && !isset($errPass) && !isset($errCaptcha)) {
                        $hash = password_hash($user_pass, PASSWORD_BCRYPT, ['cost'=>10]);
                        date_default_timezone_set("asia/kolkata");
                        $date = date("Y-m-d H:i:s");
                        //Email confirmation
                        $mail->addAddress($_POST['user_email']);
                        $email = $_POST['user_email'];
                        $email = base64_encode(urlencode($_POST['user_email']));
                        $token = getToken(32);
                        $expire_date = date("Y-m-d H:i:s", time() + 60 * 20);
                        $expire_date = base64_encode(urlencode($expire_date)); 
                        
                        
                        $mail->Subject = "Verify your email";
                        $mail->Body = "
                                    <h2>Thank you for sign up</h2>
                                    <a href='http://localhost/secured-login-registration-system/activation.php?eid={$email}&token={$token}&exd={$expire_date}'>Click here to verify</a>
                                    <p>This link is valid for 20 minutes</p>
                                    ";
                         // if email send
                         if($mail->send()) {
                        $query = "INSERT INTO users (first_name, last_name, user_name, user_email, user_password, validation_key, registration_date) VALUES ('$first_name', '$last_name', '$user_name', '$user_email', '$hash','$token','$date')";
                        $query_conn = mysqli_query($connection, $query);
                        if(!$query_conn) {
                            die("Query failed" . mysqli_error($connection));
                        } else {
                            echo "<div class='notification'>Sign up successful. Check your email for activation link</div>";
                            unset($first_name);
                            unset($last_name);
                            unset($user_name);
                            unset($user_email);
                        }

                    }else {
                        echo "<div class='notification'>Somethings wrong</div>";
                    }

                    }
                    
                }

            ?>
        <!-- <div class='notification'>Sign up successful. Check your email for activation link</div> -->
        <form action="sign_up.php" method="POST">
            <div class="input-box">
                <input type="text" class="input-control" placeholder="First name"
                    value="<?php echo isset($first_name)?$first_name:""; ?>" name="first_name" autocomplete="off"
                    required>
                <?php echo isset($errfn)?"<span class='error'>{$errfn}</span>":""; ?>
            </div>
            <div class="input-box">
                <input type="text" class="input-control" placeholder="Last name"
                    value="<?php echo isset($last_name)?$last_name:""; ?>" name="last_name" autocomplete="off" required>
                <?php echo isset($errln)?"<span class='error'>{$errln}</span>":""; ?>
            </div>
            <div class="input-box">
                <input type="text" class="input-control" placeholder="Username"
                    value="<?php echo isset($user_name)?$user_name:""; ?>" name="user_name" autocomplete="off" required>
                <?php echo isset($errun)?"<span class='error'>{$errun}</span>":""; ?>
            </div>
            <div class="input-box">
                <input type="email" class="input-control" placeholder="Email address"
                    value="<?php echo isset($user_email)?$user_email:""; ?>" name="user_email" autocomplete="off"
                    required>
                <?php echo isset($errue)?"<span class='error'>{$errue}</span>":""; ?>
            </div>
            <div class="input-box">
                <input type="password" class="input-control" placeholder="Enter password" name="user_password"
                    autocomplete="off" required>
                <?php echo isset($errPass)?"<span class='error'>{$errPass}</span>":""; ?>
            </div>
            <div class="input-box">
                <input type="password" class="input-control" placeholder="Confirm password" name="user_confirm_password"
                    autocomplete="off" required>
                <?php echo isset($errPass)?"<span class='error'>{$errPass}</span>":""; ?>
            </div>
            <div class="g-recaptcha" data-sitekey="<?php echo $public_key; ?>"></div>
            <?php echo isset($errCaptcha)?"<span class='error'>{$errCaptcha}</span>":""; ?>
            <div class="input-box">
                <input type="submit" class="input-submit" value="SIGN UP" name="sign-up">
            </div>
            <div class="sign-up-cta"><span>Already have an account?</span> <a href="login.php">Login here</a></div>
        </form>

    </div>
</div>

<?php require_once("includes/footer.php"); ?>