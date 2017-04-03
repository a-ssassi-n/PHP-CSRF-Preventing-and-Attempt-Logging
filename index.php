<?php
session_start();

// initialize token

if (empty($_SESSION['token'])) {
    if (function_exists('mcrypt_create_iv')) {
        $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    }
    else {
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CSRF Token Verification</title>
    </head>
    <body>
        <form action="post.php" method="POST">
            <input type="text" name="inputText">
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
            <input type="submit" value="Send">
        </form>
    </body>
</html>