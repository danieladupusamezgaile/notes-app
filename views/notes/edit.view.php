<?php require_once __DIR__ . "/../layouts/head.php" ?>
<?php require_once __DIR__ . "/../layouts/nav.php" ?>

<div class="p-2">
<div class="page-content container note-has-grid">
    <h3>Edit Note</h3>
    <form action="/notes/update" method="post">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <div class="form-text text-danger"><?= $emptyErr ?? '' ?></div>
        <div class="form-row p-1">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="title" name="title" value="<?= $title ?? ''?>"
                    placeholder="Title">
            </div>
        </div>
        <div class="form-row p-1">
            <div class="form-group col-md-6">
                <textarea class="form-control" id="note" name="body" rows="9" placeholder="Your Note"><?= $body ?? ''?></textarea>
            </div>
        </div>
        <div class="form-row p-1">
            <button type="submit" class="btn btn-outline-success">Save</button>
            <a href="/notes/show?id=<?= $_GET['id'] ?>" class="btn btn-outline-secondary">Back</a>
        </div>
    </form>
</div>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php" ?>