<?php

/**
 * Profile
 */

//Initialisation
require_once('includes/init.php');

// Require User to be logged in to see this page
Auth::getInstance()->requireLogin();

$page_title = 'Profile';
include('includes/header.php');

?>

<h1>Profile</h1>

    <?php $user = Auth::getInstance()->getCurrentUser(); ?>

    <dl>
        <dt>Name</dt>
        <dd><?php echo htmlspecialchars($user->name); ?></dd>
        <dt>Email address</dt>
        <dd><?php echo htmlspecialchars($user->email); ?></dd>
    </dl>

<?php include('includes/footer.php'); ?>
