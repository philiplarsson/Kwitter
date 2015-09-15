
<form action="" method="post">
  
  <ul>
    <li>
      <label for="username">Username: </label>
      <input name="username" type="text"/>
    </li>
    <li>
      <label for="password">Password: </label>
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
  <?php endif ?>
</form>
