<?php require_once __DIR__ . "/../layouts/head.php" ?>
<?php require_once __DIR__ . "/../layouts/nav.php" ?>

<div class="p-2">
    <div class="page-content container note-has-grid">
        <h3>My Notes</h3>

        <a href="/notes/create"><button type="button" class="btn btn-outline-primary">New Note</button></a>
        <label  type="button" class="btn btn-outline-danger" for="delete-note">Delete</label>
        <form action="/notes/delete" method="post">

            <div class="tab-content bg-transparent">
                <div id="note-full-container" class="note-has-grid row">
                    <?php if ($notes ?? false): ?>
                        <?php foreach ($notes as $note): ?>
                            <?php extract($note) ?>

                            <div class="col-md-4 single-note-item all-category pt-1">
                                <div class="card card-body">
                                    <div>
                                        <input type="checkbox" class="delete-checkbox" name="checkbox[]" value="<?= $id ?>">
                                    </div>
                                    <h5 class="note-title text-truncate w-75 mb-0">
                                        <a style="text-decoration: none; color: black;" href="/notes/show?id=<?= $id ?>"><?= $title ?></a>
                                        <?= $id ?>
                                    </h5>
                                    <p class="note-date font-12 text-muted">11 March 2009</p>
                                    <div class="note-content">
                                        <p class="note-inner-content text-muted"
                                            data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                            <?= substr($body, 0, 28) . " ..." ?>
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <input type="submit" id="delete-note" hidden>
                                        <!-- <a href="/notes/edit?id=<?= $id ?>"><button type="button" class="btn btn-outline-dark">Edit</button></a> -->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <p>You have no notes created</p>
                    <?php endif ?>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php" ?>