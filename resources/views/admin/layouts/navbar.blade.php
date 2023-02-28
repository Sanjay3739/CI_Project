<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!----======== CSS ======== -->
  <link href="{{asset('css/navbar.css')}}" rel="stylesheet" />


  <!-- ======= fontawesome======= -->
 <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

  <!----===== Boxicons CSS ===== -->


  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <!--<title>Dashboard Sidebar Menu</title>-->
</head>

<body>
  <nav class="sidebar close">
    <header>
      <div class="image-text">
        <div class="text logo-text">
          <span class="name">Sanjay</span>

          <span class="profession">NAVIGATION</span>
        </div>
      </div>

      <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar" id="menu-bar">
      <div class="menu">

        <li class="search-box">
          <i class='bx bx-search icon'></i>
          <input type="text" placeholder="Search Ganes...">
        </li>

        <ul class="menu-links">
          <li class="nav-link">
            <a href="#">
                <i class="fa-regular fa-user" style="width: 25px;"  id="sa"></i>
              <span class="text nav-text"  id="sb">User</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#">
                <i class="fa-regular fa-file-lines" id="sa" style="width: 25px;"></i>

              <span class="text nav-text" id="sc">CMS Page</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#">
                <img src="images/target.png" id="sa"   style="width: 25px;">
              <span class="text nav-text" id="sb">Mission</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#">
                <img src="images/layout.png" id="sa" style="width: 25px;" alt="">
                 <span class="text nav-text" id="sb"> Mission Theme</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#">
           <img src="images/pencil.png" id="sa" style="width: 25px;" alt="">
              <span class="text nav-text" id="sb">Mission Skill</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#">
             <img src="images/folders.png" id="sa" style="width: 25px;" alt="">
              <span class="text nav-text" id="sb">Mission Application</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#">
              <img src="images/story.png"id="sa"  style="width: 25px;" alt="">
              <span class="text nav-text" id="sb">Story</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#">
             <img src="images/ribbon-black-banner.png" id="sa" style="width: 25px;" alt="">
              <span class="text nav-text" id="sb">Banner Management</span>
            </a>
          </li>

        </ul>
      </div>

      <div class="bottom-content">
        <li class="">
          <a href="#">
            <i class='bx bx-log-out icon'></i>
            <span class="text nav-text" >Logout</span>
          </a>
        </li>

        <li class="mode">
          <div class="sun-moon">
            <i class='bx bx-moon icon moon'></i>
            <i class='bx bx-sun icon sun'></i>
          </div>
          <span class="mode-text text">Dark mode</span>

          <div class="toggle-switch">
            <span class="switch"></span>
          </div>
        </li>

      </div>
    </div>

  </nav>

  <section class="home">
    <div class="text">Dashboard Sidebar</div>
  </section>

  <script>
    const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
    toggle.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    })
    searchBtn.addEventListener("click", () => {
      sidebar.classList.remove("close");
    })
    modeSwitch.addEventListener("click", () => {
      body.classList.toggle("dark");
      if (body.classList.contains("dark")) {
        modeText.innerText = "Light mode";
      } else {
        modeText.innerText = "Dark mode";
      }
    });
  </script>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>
