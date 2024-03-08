<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Notes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= $homeActive ?? '' ?>" href="/">Home</a>
        </li>
        <?php if ($_SESSION['user'] ?? false): ?>
        <li class="nav-item">
          <a class="nav-link <?= $notesActive ?? '' ?>" href="/notes">My Notes</a>
        </li>
        <?php endif ?>
        <?php if ($_SESSION['user'] ?? false): ?>
        <li class="nav-item">
          <a class="nav-link <?= $profileActive ?? '' ?>" href="#">Profile</a>
        </li>
        <?php endif ?>
        <li class="nav-item">
          <?php if ($_SESSION['user'] ?? false): ?>
            <a class="nav-link" href="/logout">Sign Out</a>
          <?php else: ?>
            <a class="nav-link" href="/authenticate">Sign In</a>
          <?php endif ?>
        </li>
      </ul>
    </div>
  </div>
</nav>