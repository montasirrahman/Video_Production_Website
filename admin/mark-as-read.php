


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
      text-align: center;
    }
</style>
<body>
<?php 
session_start();

require_once "authCookieSessionValidate.php";

if(!$isLoggedIn) {
    header("Location: ./");
}
?>
<?php
    include 'db.php';
 
    // prevent from SQL injection
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
     
    // set the message as read
    $sql = "UPDATE inbox SET is_read = 1 WHERE id = " . $id;
    mysqli_query($conn, $sql);
 
    // display a success message
    echo "<p>Message has been marked as read.</p>";
?>

<script>

    // Your application has indicated there's an error
    window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "index.php";

    }, 100);

</script>

</body>
</html>