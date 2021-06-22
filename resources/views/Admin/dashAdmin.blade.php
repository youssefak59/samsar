<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  {{-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> --}}
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard
  </title>


  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <script src="https://kit.fontawesome.com/47e2cff383.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style>
   
    li a.link-active,
    li  a.exact-active {
        background-color: #26c2d66e !important;
    }
    .pro-file{
      list-style: none;
    }
    .name-profile{
      /* font-weight: 900; */
    }
    
  </style>
  
</head>

<body class="">
  <div class="wrapper" id="app">
   
    <div class="sidebar" data-color="purple" data-background-color="white" >
   
   
      <div class="logo d-flex justify-content-center mt-2">
        
      <profile-admin  authname="{{ Auth::user()->name }}"  authfonction="{{ Auth::user()->fonctiontype }}" authid="{{ Auth::user()->id }}" authimage="{{ Auth::user()->image }}" ></profile-admin>
      </div>
    
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
              {{-- <router-link to="/foo" >foo</router-link> --}}
              <router-link  tag="a" class="nav-link"    to="/fr/cms" >
                  <i class="material-icons">dashboard</i>
                 <p>dashboard</p>
            </router-link>
          
          </li>
          <li class="nav-item ">
                {{-- <router-link tag="li"  class="nav-link"    to="/fr/cms/posting" > --}}
            <router-link tag="a"  class="nav-link"    to="/fr/cms/posting" >
               <i class="far fa-plus-square"></i>
                 <p>Publier Une Annonce</p>
            </router-link>
          </li>
          <li class="nav-item ">
            {{-- <a class="nav-link" href="#">
              <i class="material-icons">content_paste</i>
              <p>Table List</p>
            </a> --}}
             <router-link tag="a"  class="nav-link"    to="/fr/cms/annonces/premium" >
                 <i class="material-icons">content_paste</i>
                 <p>Annonces Premium</p>
            </router-link>
          </li>
          <li class="nav-item ">
            <router-link tag="a"  class="nav-link"    to="/fr/cms/annonces/normal" >
                 <i class="material-icons">content_paste</i>
                 <p>Annonces Normal</p>
            </router-link>
          </li>
          <li class="nav-item ">
            <router-link tag="a"  class="nav-link"    to="/fr/cms/profile" >
                 <i class="material-icons">person_outline</i>
                 <p>Edit profile</p>
            </router-link>
          </li>
         
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav-bar-admin ></nav-bar-admin>
      <!-- End Navbar -->
      <div class="content">
        
            <vue-page-transition>
              <router-view></router-view>
            </vue-page-transition>
           
      </div>
    </div>
    
  </div>
  
  <!--   Core JS Files   -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>




 
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
 
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
 
  

</body>

</html>