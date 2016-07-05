<?php

$title = 'Sign Up';
include(dirname(__DIR__) . "/layout.php");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>Please Sign up</h1>
            <?php if (isset($_SESSION['user'])): ?>
                <h2>You are already logged in.</h2>
            <?php elseif ($_SESSION['invalid'] == true): ?>
                <h2>That information doesn't match our records.</h2>'
            <?php endif; ?>
        
            <div>
                <form class="form-signin" action="/users/create" method="post">

                    <h2 class="form-signin-heading">Sign Up</h2>

                    <label for="name" class="sr-only">Name</label>
                    <input type="name" id="name" name="name" id="inputName" class="form-control"
                            placeholder="Email address" required autofocus maxlength="15">
                    
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" 
                        placeholder="Email address" required>

                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" 
                        placeholder="Password" required>
                    
                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Up">Sign Up</button>

                    <p class="lead"></p>
                    <p>If you're not registered <a href="/users/signup">go sign up!</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
    
<?php include(dirname(__DIR__) . "/footer.php");
