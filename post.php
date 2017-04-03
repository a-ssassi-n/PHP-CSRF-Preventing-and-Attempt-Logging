<?php
session_start();

//check if the token is present

if (empty($_POST['token'])) {

    //Check if session token matches the token posted by form
    
    if (hash_equals($_SESSION['token'], $_POST['token'])) {
        $input = $_POST['inputText'];
        $message = "CSRF Validation Successful! You entered: " . $input;
        echo " <br /> $message";
    }
    else {

        $webpage = $_SERVER['SCRIPT_NAME']; //name of executed file
        $timestamp = date('m/d/Y h:i:s'); //timestramp
        $filename = 'log.txt'; //log file 
        $fp = fopen($filename, 'a+');
        chmod($iplogfile, 0777);
        fwrite($fp, '[' . $timestamp . ']: | Script Executed: ' . $webpage . "\n" . '---------------------' . "\r\n\n");
        fclose($fp);
    }
}

?>