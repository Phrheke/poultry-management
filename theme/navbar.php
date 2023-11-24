<header>
  <div class="nav-container">
    <nav class="nav section-container">
        <a class="nav__logo" href="dashboard.php">
          PMS
        </a>
        <ul class="nav__list hide-for-mobile">
            <li class="nav__item"><a href="dashboard.php" class="nav__link">Dashboard</a></li>
            <li class="nav__item"><a href="manage-birds.php" class="nav__link">Birds</a></li>
            <li class="nav__item"><a href="manage-eggs.php" class="nav__link">Eggs</a></li>
            <li class="nav__item"><a href="manage-batches.php" class="nav__link">Batches</a></li>
            <li class="nav__item"><a href="manage-feeding-schedules.php" class="nav__link">Feeding Schedules</a></li>
            <li class="nav__item"><a href="manage-quarantine.php" class="nav__link">Quarantine</a></li>
            <li class="nav__item"><a href="communications.php" class="nav__link">Communications</a></li>
        </ul>
        <a href="logout.php" class="btn hide-for-mobile">Logout</a>
        <div id="mobileMenu" class="mobile-menu is-hidden">
            <ul class="mobile-menu__list">
              <li class="mobile-menu__link"><a href="dashboard.php" class="nav__link">Dashboard</a></li>
              <li class="mobile-menu__link"><a href="manage-birds.php" class="nav__link">Birds</a></li>
              <li class="mobile-menu__link"><a href="manage-eggs.php" class="nav__link">Eggs</a></li>
              <li class="mobile-menu__link"><a href="manage-batches.php" class="nav__link">Batches</a></li>
              <li class="mobile-menu__link"><a href="manage-feeding-schedules.php" class="nav__link">Feeding Schedules</a></li>
              <li class="mobile-menu__link"><a href="manage-quarantine" class="nav__link">Quarantine</a></li>
              <li class="mobile-menu__link"><a href="communications" class="nav__link">Communications</a></li>
            </ul>
            <hr class="divider">
            <a href="logout.php" class="btn">Logout</a>
        </div>
        <a href="#" id="hamburger" class="hamburger hide-for-desktop">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </a>
    </nav>
  </div>
</header>


<script>
  const hamburger = document.getElementById("hamburger");
  const mobileMenu = document.getElementById("mobileMenu");

  hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("is-toggled");
      mobileMenu.classList.toggle("is-hidden");
      document.body.classList.toggle("no-scroll")
  });
</script>