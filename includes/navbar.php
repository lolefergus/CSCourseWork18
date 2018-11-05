<!-- Navbar -->
<section class="sct-color-1">
  <nav class="navbar navbar-expand-lg navbar--uppercase  navbar navbar-inverse bg-dark ">
    <div class="container container-lg navbar-container my-3">
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

        <div class="collapse navbar-collapse align-items-center justify-content-end" name="navbar_main">


          <!-- Navbar links -->

          <div class="dropdown">
            <button class="btn btn-base-1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>

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
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
              <div class="dropdown-menu" aria-labelledby="dropdown07">
                <a class="dropdown-item" href="/account/login/">Login</a>
                <a class="dropdown-item" href="#">Sign Up</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </nav>
  </section>
