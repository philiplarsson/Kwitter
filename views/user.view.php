

<h1><?= $name; ?></h1>
<img src=" <?= getGravatarImage($email); ?>" />
<div class="user-information">
    <ul>
        <li><p><?= $email; ?></p></li>
        <li><p><?= $username; ?></p></li>    
    </ul>
</div>

<a href='logout.php'>logout</a>

