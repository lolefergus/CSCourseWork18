<!-- Navbar -->
<section class="sct-color-1">
  <nav class="navbar navbar-expand-lg navbar--uppercase  navbar navbar-inverse bg-dark ">
    <div class="container navbar-container my-3">
      <!-- Brand/Logo -->
      <a class="navbar-brand" href="/">
        <img src="/images/logo.png" class="d-none d-lg-inline-block" style="max-height:60px;" alt="Boomerang">
        <img src="/images/logo.png" class="d-lg-none" style="max-height:60px;" alt="Boomerang">            </a>

        <div class="d-inline-block">
          <!-- Navbar toggler  -->
          <button class="navbar-toggler hamburger hamburger-js hamburger--spring" type="button" data-toggle="collapse" data-target="#navbar_main" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>

        <div class="collapse navbar-collapse  float-right" name="navbar_main">


          <!-- Navbar links -->



          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/index.php">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/news/index.php">
                News
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/gallery/index.php">
                Gallery
              </a>
            </li>
            <?php
            if ($_SESSION['active'] == true) {
              echo'
              <li class="nav-item">
                <a class="nav-link" href="/account/index.php">
                  Account Home
                </a>
              </li>
              ';
            }
            else {
              echo'
              <li class="nav-item">
                <a class="nav-link" href="/account/login/index.php">
                  Login
                </a>
              </li>
              ';
            }
            ?>
          </ul>
        </div>

      </div>
    </nav>
  </section>
