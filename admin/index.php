<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();

require_once "Auth.php";
require_once "Util.php";

$auth = new Auth();
$db_handle = new DBController();
$util = new Util();

require_once "authCookieSessionValidate.php";

if ($isLoggedIn) {
    $util->redirect("dashboard.php");
}

if (! empty($_POST["login"])) {
    $isAuthenticated = false;
    
    $username = $_POST["member_name"];
    $password = $_POST["member_password"];
    
    $user = $auth->getMemberByUsername($username);
    if (password_verify($password, $user[0]["member_password"])) {
        $isAuthenticated = true;
    }
    
    if ($isAuthenticated) {
        $_SESSION["member_id"] = $user[0]["member_id"];
        
        // Set Auth Cookies if 'Remember Me' checked
        if (! empty($_POST["remember"])) {
            setcookie("member_login", $username, $cookie_expiration_time);
            
            $random_password = $util->getToken(16);
            setcookie("random_password", $random_password, $cookie_expiration_time);
            
            $random_selector = $util->getToken(32);
            setcookie("random_selector", $random_selector, $cookie_expiration_time);
            
            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);
            
            $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);
            
            // mark existing token as expired
            $userToken = $auth->getTokenByUsername($username, 0);
            if (! empty($userToken[0]["id"])) {
                $auth->markAsExpired($userToken[0]["id"]);
            }
            // Insert new token
            $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
        } else {
            $util->clearAuthCookie();
        }
        $util->redirect("dashboard.php");
    } else {
        $message = "Invalid Login";
    }
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>


    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        background: #42464D;
    }
</style>
<body>
    <center>
        <img src="../img/logo/logo4.png" class="header_logo">
    </center>
    <center class="top_center">
        <form action="" method="post" id="frmLogin">
            <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
            <div class="field-group">
                <p class="sign_text">
                    Enter your username and password to login.
                </p>
                <div>
                    <input placeholder="Username" name="member_name" type="text"
                        value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>"
                        class="input-field">
                </div>
            </div>
            <div class="field-group">
                
                <div>
                    <input placeholder="Password" name="member_password" type="password"
                        value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>"
                        class="input-field">
                </div>
            </div>
            <div class="field-group">
                <div style="text-align: left;">
                    <input type="checkbox" name="remember" id="remember"
                        <?php if(isset($_COOKIE["member_login"])) { ?> checked
                        <?php } ?> /> <label for="remember-me">Remember me</label>
                </div>
            </div>
            <div class="field-group">
                <div>
                    <input type="submit" name="login" value="Log in"
                        class="form-submit-button"></span>
                </div>
            </div>
        </form>
    </center>

</body>
</html>