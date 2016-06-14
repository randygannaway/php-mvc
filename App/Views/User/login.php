<?php

/**
 *  Log in a user
 */

//Initialisation
// require_once('includes/init.php');

// Require guest
//Auth::getInstance()->requireGuest();

// Get checked status of the "remember "me option
$remember_me = isset($_POST['remember_me']);

// Process the submitted form
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  //  $email = $_POST['email'];

//    if (Auth::getInstance()->login($email, $_POST['password'], $remember_me)) {
       
    if ($_SESSION['password_invalid'] == true) {
        $message = "That information does not match our recoreds.";
    }

   // }

//}



$page_title = 'Login';

?>

<?php 
    if (isset($message)) {
        echo $message;
    }   
?>

<form method="post" id="signupForm" action="/auth/login">
    <div>
        <label for="email">Email Address</label>
        <input id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" />
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" />
    </div>

    <div>
        <label for="remember_me">
            <input id="remember_me" name="remember_me" type="checkbox" value="1" 
                    <?php if ($remember_me): ?>checked="checked"<? endif; ?>/> Remember Me</input>
        </label>

    <input type="submit" value="Login" />
</form>

