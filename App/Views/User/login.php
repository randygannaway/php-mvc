<?php
$title = 'Login';
include(dirname(__DIR__) . "/layout.php");
?>

    <h1 class="page-header">Txors</h1>

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
                        <input type="checkbox" name="remember" value="remember"> Remember me
                    </label>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

                <p class="lead"></p>
                <p>If you're not registered <a href="users/signup">go sign up!</a></p>

            </form>
        </div>

        <div class="col-lg-4">
        </div>

        <?php include(dirname(__DIR__) . "/footer.php"); ?>
