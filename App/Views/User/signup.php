<?php

/**
 * Sign up new user
 */


// Require that user is not logged in to see this page
//Auth::getInstance()->requireGuest();

// Process the submitted form (this would go in a controller?)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = User::signup($_POST);

    if (empty($user->errors)) {

        // Redirect to succes page
        header('Location: ' . '/signup_success.php');
        exit;
    }
}

$page_title = 'Sign Up';

?>

<h1>Sign Up</h1>

<?php if (isset($user)): ?>
    <ul>
        <?php foreach ($user->errors as $error): ?>
        <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<form method="post" action="/users/create">
    <div>
        <label for="name">Name</label>
        <input id="name" name="name" value="<?php isset($user) ? htmlspecialchars($user->name) : ''; ?>" />
    </div>

    <div>
        <label for="email">Email address</label>
        <input id="name" name="email" required="required" type="email"  value="<?php isset($user) ? htmlspecialchars($user->email) : ''; ?>" />
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required="required" pattern=".{5,}"/>
    </div>

    <input type="submit" value="Sign Up" />
</form>

