<h2>Kweets</h2>
<p>
    Here you can see all the kweets.
</p>
<?php if (!$data): ?>
    <!-- There are no tweets -->
    <p>There are no kweets at this time...</p>

<?php else: ?>
    <?php foreach ($data as $kweet) : ?>
        <?php extract($kweet); ?>
        <div class="kweet">
            <p class="author"><?= $username; ?></p>
            <p class="content"><?= $content; ?></p>
        </div>
    <?php endforeach; ?>

<?php endif; ?>

