<?php

/**
* Template Name: فراموشی رمز
*/

include 'forgotphp.php';
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
<body class="container-fluid d-flex align-items-center justify-content-center">
    <div class="card" style="width: 700px;">
  <div class="card-body">
    <h1 style="text-align:center;" class="text-primary">Login Room</h1><br>
<form method="GET" action="\wordpress\wordpress\wp-content\themes\twentytwentyfour\forgotphp.php">
<input type="hidden" name="action" value="update_password"> 
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Job</label>
            </div>
            <select id="list" name="pish" class="custom-select" required>
                <option selected>Choose ...</option>
                <?php foreach ($roles as $rolss) {
                    echo '<option>' . htmlspecialchars($rolss) . '</option>';
                } ?>
            </select>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Name</span>
            </div>
            <input type="text" name="name" class="form-control" required>
        </div>
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">New Password</span>
        </div>
        <input type="password" name="password" class="form-control" required>
    </div>
              <br>
    <input type="submit" value="Update Password" style="width:600px;" class="btn btn-primary btn-lg btn-block container-fluid d-flex align-items-center justify-content-center">
<a style="padding: 10px;" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover container-fluid d-flex align-items-center justify-content-center" href="فرم-ورود/">Log in to the account</a>
</form>
</div>
</div>
</body>
</html>