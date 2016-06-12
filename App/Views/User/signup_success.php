<?php

/*
 *  Signup success page
 */

//Initialisation
require_once('includes/init.php');

// Set the title, show the page header, then the rest of the HTML
$page_title = 'Success';
include('includes/header.php');

?>

<h1>Sign Up</h1>

<p>Success! Thank you for signing up. You may now <a href="login.php">Log In</a>.</p>

<?php include('includes/footer.php'); ?>
