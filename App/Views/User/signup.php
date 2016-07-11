<?php
$title = 'Sign Up';
include(dirname(__DIR__) . "/layout.php");
?>

    <h1 class="page-header">Txors</h1>

        <div class="col-lg-4">
        </div>

        <div class="col-lg-4">
            <form class="form-signin" action="/users/create" method="post">

                <h2 class="form-signin-heading">Sign Up</h2>

                <label for="name" class="sr-only">Name</label>
                <input type="name" id="name" name="name" id="inputName" class="form-control"
                       placeholder="Name" required autofocus maxlength="15">

                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="email" id="inputEmail" class="form-control"
                       placeholder="Email address" required>

                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control"
                       placeholder="Password" required>

                <button class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Up">Sign Up</button>

            </form>
        </div>

        <div class="col-lg-4">
        </div>

<?php include(dirname(__DIR__) . "/footer.php");
