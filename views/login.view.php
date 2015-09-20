<h1>Login page</h1>
<?php
if (isset($_SESSION["username"])) {
    $status = "You are already logged in. <br>To go to user page, click <a href='user.php'>here</a>";
}
?>

<form class="login-form form-fade" action="" method="post">
  <ul>
    <li>
        <label for="username">Username</label></br>
        <input name="username" type="text"/>
    </li>
    <li>
        <label for="password">Password</label></br>
        <input name="password" type="password"/>
    </li>

    <li>
      <input class="login_button" name="" type="submit" value="Log In"/>
      <input class="login_button" name="" type="reset" value="Reset"/>
    </li>
  </ul>

  <?php if ( isset($status) ) : ?>
    <div class="status-message">
      <?= $status ;?>
    </div>
  <?php endif; ?>
</form>
