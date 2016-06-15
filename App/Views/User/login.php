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
    <h1>Login in and get to work!</h1>
  </div>
  <p class="lead"></p>
  <p>If you're not registered <a href="users/signup">go sign up!</a></p>

<form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

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
</div>
<?php include(dirname(__DIR__) . "/footer.php"); ?>
