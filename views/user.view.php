

<h1><?= $name; ?></h1>

<div class="user-information">
    <img src=" <?= getGravatarImage($email); ?>" />
    
    <ul>
        <li><p><?= $email; ?></p></li>
        <li><p><?= $username; ?></p></li>    
    </ul>
</div>
</br>
<div class="user-menu">
    <a class="styled-button" href='logout.php'>logout</a>    
</div>



