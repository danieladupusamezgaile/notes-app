<?php require_once __DIR__ . "/../layouts/head.php" ?>
<?php require_once __DIR__ . "/../layouts/nav.php" ?>

<div class="p-2">
    <h3>New Note</h3>
    <form action="/notes/create" method="post">
    <div class="form-text text-danger"><?= $emptyErr ?? '' ?></div>
        <div class="form-row p-1">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="title" name="title" value="<?= $_POST['title'] ?? ''?>"
                    placeholder="Title">
            </div>
        </div>
        <div class="form-row p-1">
            <div class="form-group col-md-6">
                <textarea class="form-control" id="note" name="body" rows="3" placeholder="Your Note"><?= $_POST['body'] ?? ''?></textarea>
            </div>
        </div>
        <div class="form-row p-1">
            <button type="submit" class="btn btn-outline-primary">Save</button>
        </div>
    </form>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php" ?>