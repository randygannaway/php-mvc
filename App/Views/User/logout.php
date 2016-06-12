<?php

/*
 *  Log out user
 */

require_once('includes/init.php');

Auth::getInstance()->logout();

// Redirect to home page
Util::redirect('/index.php');


