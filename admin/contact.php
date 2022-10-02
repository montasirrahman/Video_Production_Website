


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<style>
    body {
      width: 100%;
      height: 100%;
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      overflow-x: hidden;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-weight: 500;
      font-size: 30px;
      background: #13242F;
      color: #fff;
    }
</style>
<body>
<?php
    include 'db.php';
    session_start();
 
    // check if the form submits
    if (isset($_POST["contact_us"]))
    {
        $_token = $_POST["_token"];
 
        // check CSRF token
        if (isset($_SESSION["_token"]) && $_SESSION["_token"] == $_token)
        {
            // remove the token so it cannot be used again
            unset($_SESSION["_token"]);
 
            // connect with database
            //$conn = mysqli_connect("localhost", "root", "", "01");
 
            // get and validate input fields from SQL injection
            $name = mysqli_real_escape_string($conn, $_POST["name"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $message = mysqli_real_escape_string($conn, $_POST["message"]);
            $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
            $project_type = mysqli_real_escape_string($conn, $_POST["project_type"]);
            $is_read = 0;
 
            /* sending email
            $headers = 'From: YourWebsite <admin@yourwebsite.com>' . "\r\n";
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
             
            $to = "admin@gmail.com";
            $subject = "New Message";
 
            $body = "<h1>Message from:</h1>";
            $body .= "<p>Name: " . $name . "</p>";
            $body .= "<p>Email: " . $email . "</p>";
            $body .= "<p>Message: " . $message . "</p>";
            
 
            mail($to, $subject, $body, $headers);

            */
 
            // saving in database
            $sql = "INSERT INTO inbox(name, email, message, phone, project_type, is_read, created_at) VALUES ('" . $name . "', '" . $email . "', '" . $message . "', '" . $phone . "', '" . $project_type . "', " . $is_read . ", NOW())";
            mysqli_query($conn, $sql);
 
            echo "<center><p >Your message has been received. Thank you.</p></center>";
        }
        else
        {
            echo "<center><p>Something went wrong.</p></center>";
        }
 
        header("refresh: 2; url=../contact.php");
    }
?> 
</body>
</html>