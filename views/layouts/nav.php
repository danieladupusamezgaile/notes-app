<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Notes</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <!-- <li class="nav-item">
          <a class="nav-link" href="/">My Notes</a>
        </li> -->
        <li class="nav-item">
        <?php if ($_SESSION['user'] ?? false): ?>
          <a class="nav-link <?= $notesActive ?? '' ?>" href="/notes">My Notes</a>
          <?php else: ?>
            <a class="nav-link <?= $notesActive ?? '' ?>" href="/">Notes</a>
        <?php endif ?>
        </li>
        <li class="nav-item">
          <?php if ($_SESSION['user'] ?? false): ?>
            <a class="nav-link" href="/logout">Sign Out</a>
          <?php else: ?>
            <a class="nav-link <?= $authenticateActive ?? '' ?>" href="/authenticate">Sign In</a>
          <?php endif ?>
        </li>
      </ul>
    </div>
  </div>
</nav>