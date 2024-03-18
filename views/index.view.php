<?php require_once __DIR__ . "/layouts/head.php" ?>
<?php require_once __DIR__ . "/layouts/nav.php" ?>

<div class="p-2">
    <h3>Notes</h3>
    <p><?= isset($_SESSION['user']) ? 'Logged in as: '.$_SESSION['user']['id'] : 'Not Logged In' ?></p>

</div>

<?php require_once __DIR__ . "/layouts/footer.php" ?>
