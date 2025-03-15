
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mod-css/navbar.css">
    <link rel="stylesheet" href="css/mod-css/logo.css">
    <link rel="stylesheet" href="css/mod-css/image.css">
    <link rel="stylesheet" href="css/mod-css/anim1.css">
    <link rel="stylesheet" href="css/mod-css/footer.css">
    <link rel="stylesheet" href="css/mod-css/btn.css">
<style>
    body{
        background-color:#AA71D7;
    }
</style>
        <link rel="stylesheet" href="css/mod-css/footer.css">
    <link rel="stylesheet" href="css/mod-css/heading_para.css">
  </head>
  <body>
    <h1 class="h1">Indian Institute of Technology Indore</h1>
    <h2 class="h2">School of Humanities and Social Sciences </h2>
 <!-- Navbar -->
  <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light nav-castom_1">
    <div class="container-fluid">
      <img src="img/IITIndorelogo.png" class="logo2">
      <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>  
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="Overview.html" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              About Us
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Overview</a></li>
            
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Research 
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Research Area</a></li>
              <li><a class="dropdown-item" href="#">Research Labs</a></li>
              <li><a class="dropdown-item" href="#">Publication & Paper</a></li>
              <li><a class="dropdown-item" href="#"> Center </a></li>
              <li><a class="dropdown-item" href="#"> projects & Consultancy</a></li>

            </ul>
          </li>   
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Aademics
            </a>
            <div class="dropdown-menu mega-menu" aria-labelledby="navbarDropdownMenuLink">
              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <h2 class="dropdown-header h1_mega_menu"><u>PHD</u></h2>
                    <div class="link1_megamenu"> 
                    <a class="dropdown-item" href="#">PhD Program</a>
                    <a class="dropdown-item" href="#">PhD Course</a>
                    <a class="dropdown-item" href="#">PhD Admission</a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <h2 class="dropdown-header h2_mega_menu"><u>Master Program</u></h2>
                    <h2 class="dropdown-header h2_mega_menu">MS</h2>
                    <div class="link2_megamenu"> 
                    <a class="dropdown-item" href="#">MS Program</a>
                    <a class="dropdown-item" href="#">MS Course</a>
                    <a class="dropdown-item" href="#">MS Admission</a>
                    </div>
                    <h2 class="dropdown-header h2_mega_menu">MA</h2>
                    <div class="link2_megamenu"> 
                    <a class="dropdown-item" href="#">MA Program</a>
                    <a class="dropdown-item" href="#">MA Course</a>
                    <a class="dropdown-item" href="#">MA Admission</a>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </li>

           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Outreach & Events   
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Upcoming Events</a></li>
              <li><a class="dropdown-item" href="#">Earlier Events</a></li>
               
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              People 
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Faculty</a></li>
              <li><a class="dropdown-item" href="#">PhD Students</a></li>
              <li><a class="dropdown-item" href="#">Alumni</a></li>
              <li><a class="dropdown-item" href="#">Stuff</a></li>
               
            </ul>
          </li>
        

          <li class="nav-item">
            <a class="nav-link" href="#">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
        
        <div class="search-icon mt-5 text-center">
          <img id="searchIcon" src="img\icon1.png" alt="Search" class="search-icon">
          <input type="text" id="searchInput" class="form-control search-input" placeholder="Type to search...">
      </div>
      </div>
    </div>
  </nav>  
  <div style="margin-left:7% ">   
  <?php include 'Staff.php';?>
  </div>
 

<script>
    // Smooth scroll to the "Contact Us" section
    document.getElementById('ho_link').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default anchor click behavior

      const targetSection = document.querySelector('home');
      targetSection.scrollIntoView({ behavior: 'smooth' }); // Smoothly scroll to the section
    });
  </script>
    <script>
        // Smooth scroll to the "Contact Us" section
        document.getElementById('contact-link').addEventListener('click', function(event) {
          event.preventDefault(); // Prevent default anchor click behavior
    
          const targetSection = document.querySelector('#contact-us');
          targetSection.scrollIntoView({ behavior: 'smooth' }); // Smoothly scroll to the section
        });
      </script>     
  <script>
    // Scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="js/bootstrap.bundle.min.js"></script>
      </body>
</html>