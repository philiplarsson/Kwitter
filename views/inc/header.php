<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <title><?= get_title($my_title); ?></title>
    <link href="../../css/normalize.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
  </head>
  <body>
      <header>
          <div class="logo">Kwitter</div>
          <nav>
              <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="posts.php">Posts</a></li>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="register.php">Register</a></li>
                  <?php if( isset( $_SESSION["username"] )) : ?>
                      <li><a href="user.php">User Page</a></li>
                  <?php endif; ?>
              </ul>
          </nav>
      </header>
