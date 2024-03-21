<?php require_once __DIR__ . "/../layouts/head.php" ?>
<?php require_once __DIR__ . "/../layouts/nav.php" ?>

<div class="p-2">
    <div class="page-content container note-has-grid">
        <h3><?= $title ?></h3>

        <div class="tab-content bg-transparent">
            <div id="note-full-container" class="note-has-grid row">

                <div class="col-md-8 single-note-item all-category pt-1">
                    <div class="card card-body">
                        <div class="pb-2">
                            <a href="/notes"><i style="color:black;" class="fa">&#xf060;</i></a>
                        </div>

                        <p class="note-date font-12 text-muted">11 March 2009</p>
                        <div class="note-content">
                            <p class="note-inner-content text-muted"
                                data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                <?= nl2br($body) ?>
                            </p>
                        </div>

                        <form action="/note/delete" method="post">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="d-flex align-items-center">
                                <a href="/notes/edit?id=<?= $id ?>"><button type="button"
                                        class="btn btn-outline-dark">Edit</button></a>
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php" ?>