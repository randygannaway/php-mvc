<?php

// Require guest
//Auth::getInstance()->requireGuest();

// Get checked status of the "remember "me option
$remember_me = isset($_POST['remember_me']);


//    if (Auth::getInstance()->login($email, $_POST['password'], $remember_me)) {
       
    if ($_SESSION['invalid'] == true) {
        $message = "That information does not match our recoreds.";
    }

$title = 'Login';
include(dirname(__DIR__) . "/layout.php");
?>

<div class="container">
  <div class="page-header">
    <h1>Sticky footer with fixed navbar</h1>
  </div>
  <p class="lead">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>body > .container</code>.</p>
  <p>Back to <a href="../sticky-footer">the default sticky footer</a> minus the navbar.</p>


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
</div>

</div>
<?php include(dirname(__DIR__) . "/footer.php");
