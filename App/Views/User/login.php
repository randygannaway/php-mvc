<?php

// Get checked status of the "remember "me option
$remember_me = isset($_POST['remember_me']);
// Detect cookie here and revert to LoginCookieController

$title = 'Login';
include(dirname(__DIR__) . "/layout.php");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h1 class="page-header">Las Esposas</h1> 

            <?php if (isset($_SESSION['message'])): ?> 
                <h2>You are already logged in.<h2>
            <?php endif; ?>

            <div class="col-lg-4">
            </div>
            
            <div class="col-lg-4">
                <form class="form-signin" action="/auth/login" method="post">

                    <h4 class="form-signin-heading">Please Log In</h4>

                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" 
                        placeholder="Email address" required autofocus>

                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" 
                        placeholder="Password" required>
                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

                    <p class="lead"></p>
                    <p>If you're not registered <a href="users/signup">go sign up!</a></p>
                
                </form>
            </div>
            
            <div class="col-lg-4">
            </div>
            
        </div>
    </div>
</div>
            
<?php include(dirname(__DIR__) . "/footer.php"); ?>
