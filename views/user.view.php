<h1><?= $name; ?></h1>

<div class="user-page-container">
    <div class="user-information">
        <img src=" <?= getGravatarImage($email); ?>" />
        
        <ul>
            <li><p><?= $email; ?></p></li>
            <li><p><?= $username; ?></p></li>    
        </ul>
    </div>

<div class="new-kweet">
    <form action="" method="post">
        <p>Enter your new kweet below:</p>
        <textarea placeholder="Enter something witty here!" type="text" name="kweet" class="new-kweet-textarea"></textarea>
        <br>
        <input class="styled-button" type="submit" value="Kweet!"/>
    </form>
</div>


</div>
<div class="user-menu">
    <a class="styled-button" href='logout.php'>logout</a>    
</div>
