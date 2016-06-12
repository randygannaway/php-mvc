<?php

/**
 *  Log in a user
 */

//Initialisation
require_once('includes/init.php');

// Require guest
Auth::getInstance()->requireGuest();

// Get checked status of the "remember "me option
$remember_me = isset($_POST['remember_me']);

// Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];

    if (Auth::getInstance()->login($email, $_POST['password'], $remember_me)) {
       
var_dump($_SESSION['return_to']); 
        // Redirect to home page
        if (isset($_SESSION['return_to'])) {
            $url = $_SESSION['return_to'];
            unset($_SESSION['return_to']);
        } else {
echo "noURL";
            $url = '/index.php';
        }

    }
//        Util::redirect($url);

}



$page_title = 'Login';
include('includes/header.php');

?>

<?php if (isset($email)): ?>
    <p>Invalid login</p>
<?php endif; ?>

<form method="post" id="signupForm">
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

<?php include('includes/footer.php'); ?>
