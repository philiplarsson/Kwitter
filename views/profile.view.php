<?php
if ( isset($data) ) {
    $username = $user["username"];
}
?>

<h3>
    <?= $username; ?>'s profile page
</h3>
<p>
    Here you can see the latest kweets from <?= $username; ?>.
</p>

<?php foreach ($kweets as $kweet) : ?>
    <?php extract($kweet); ?>
    <div class="kweet">
        <p class="content"><?= $content; ?></p>
    </div>
<?php endforeach; ?>

