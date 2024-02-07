 <!-- Navbar  -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3 navbar-scrolled{{ request()->is('/') ? ' navbar-home' : ' navbar-other' }}">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="./assets/Group_25415-removebg-preview.png" alt="" class="img-logo"></a>

      <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: center;">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="/about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}" href="/portfolio">Portfolio & Paper</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="/gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('channel') ? 'active' : '' }}" href="/channel">Channel</a>
          </li>
        </ul>
      </div>
      <div class="justify-content-center navmobile">
        <div id="myNav" class="overlayNavbar">
          <button class="bi bi-x-circle closebtn" onclick="closeNav()" aria-label="Close"></button>
  
          <div class="overlayNavbar-content">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="/" onclick="handleMenuClick('/')">Home</a>
            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="/about" onclick="handleMenuClick('/about')" >About Us</a>
            <a class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}" href="/portfolio" onclick="handleMenuClick('/portfolio')">Portfolio & Paper</a>
            <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="/gallery" onclick="handleMenuClick('/gallery')">Gallery</a>
            <a class="nav-link {{ request()->routeIs('channel') ? 'active' : '' }}" href="/channel" onclick="handleMenuClick('/channel')">Channel</a>
          </div>
        </div>
        <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776;</span>
      </div>
    </div>
  </nav>