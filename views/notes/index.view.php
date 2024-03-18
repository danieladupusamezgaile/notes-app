<?php require_once __DIR__ . "/../layouts/head.php" ?>
<?php require_once __DIR__ . "/../layouts/nav.php" ?>

<div class="p-2">
    <h3>My Notes</h3>
    <p><?= 'Logged in as: '.$_SESSION['user']['id'] ?></p>

</div>

<?php require_once __DIR__ . "/../layouts/footer.php" ?>