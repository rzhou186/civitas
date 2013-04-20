<?php

    include_once('linkedin.php');

    // You'll probably use a database
    session_name('linkedin');
    session_start();

    // OAuth 2 Control Flow
    if (isset($_GET['error'])) {
        // LinkedIn returned an error
        print $_GET['error'] . ': ' . $_GET['error_description'];
        exit;
    } elseif (isset($_GET['code'])) {
        // User authorized your application
        if ($_SESSION['state'] == $_GET['state']) {
            // Get token so you can make API calls
            getAccessToken();
        } else {
            // CSRF attack? Or did you mix up your states?
            exit;
        }
    } else { 
        if ((empty($_SESSION['expires_at'])) || (time() > $_SESSION['expires_at'])) {
            // Token has expired, clear the state
            $_SESSION = array();
        }
        if (empty($_SESSION['access_token'])) {
            // Start authorization process
            getAuthorizationCode();
        }
    }

    header('Location: index.php');

    // Congratulations! You have a valid token. Now fetch your profile 
    //$user = fetch('GET', '/v1/people/~:(firstName,lastName)');
    //print "Hello $user->firstName $user->lastName.";
    //exit;