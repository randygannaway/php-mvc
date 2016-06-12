<?php

/*
 * Homepage
 */

// Initialisation
require_once('includes/init.php');

?>


<?php include('includes/header.php'); ?>

<h1>Home</h1>

<?php if (Auth::getInstance()->isLoggedIn()): ?>

    <p>Hello <?php echo htmlspecialchars(Auth::getInstance()->getCurrentUser()->name); ?></p>
    
    <div>
        <a href="profile.php">View profile</a> or <a href="logout.php">Log out</a>
    </div>

<? else: ?>

    <p><a href="signup.php">Sign Up</a> or <a href="login.php">Log In</a></p>

<?php endif; ?>

<?php include('includes/footer.php'); ?>
