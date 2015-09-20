<h1>This is a registration site.</h1>

<form class="form-fade" action="" method="post">
    <ul>
        <li>
            <label for="username">Username: </label>
            <input name="username" type="text">
        </li>
        <li>
            <label for="name">Name: </label>
            <input name="name" type="text">
        </li>
        <li>
            <label for="email">Email: </label>
            <input name="email" type="text"/>
        </li>
        <li>
            <label for="password">Password:</label>
            <input name="password" type="password"/>
        </li>

        <li>
            <input class="login_button" name="" type="submit" value="Register"/>
            <input class="login_button" name="" type="reset" value="Reset"/>
        </li
    </ul>

    <?php if ( isset($status)) : ?>
        <div class="status-message">
          <?= $status; ?>
        </div>
    <?php endif ?>
</form>
