<?php require_once __DIR__ . "/../layouts/head.php" ?>
<?php require_once __DIR__ . "/../layouts/nav.php" ?>

<div class="p-2">
    <div class="page-content container note-has-grid">
        <h3>My Notes</h3>
        <p>
            <?= 'Logged in as: ' . $_SESSION['user']['id'] ?>
        </p>
        <a href="/notes/create"><button type="button" class="btn btn-outline-primary">New Note</button></a>

        <form action="" method="post">

            <div class="tab-content bg-transparent">
                <div id="note-full-container" class="note-has-grid row">
                    <?php if ($notes): ?>
                        <?php foreach ($notes as $note): ?>
                            <?php extract($note) ?>
                            <div class="col-md-4 single-note-item all-category pt-1">

                                <div class="card card-body">
                                    <span class="side-stick"></span>
                                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">
                                        <?= $title ?>
                                    </h5>
                                    <p class="note-date font-12 text-muted">11 March 2009</p>
                                    <div class="note-content">
                                        <p class="note-inner-content text-muted"
                                            data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                            <?= $body ?>
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                    <label for="delete-product-btn" class="btn btn-outline-dark"><i style="font-size:24px" class="fa">&#xf1f8;</i></label>
                                    <input type="submit" id="delete-product-btn" hidden>
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