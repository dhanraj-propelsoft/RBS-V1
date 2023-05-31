<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
 <!-- MDB icon -->
 <link rel="icon" href="{{asset('assets/img/logo.jpg')}}" type="image/x-icon" />
 <!-- Font Awesome -->
 <link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
 />
 <!-- Google Fonts Roboto -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('assets/css/layout.css')}}" />
 <!-- MDB -->
 <link rel="stylesheet" href="{{asset('assets/css/mdb.min.css')}}" />
 <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css
" rel="stylesheet">

<link href="{{asset('assets/css/datetime.min.css')}}" rel="stylesheet" media="screen" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  </head>
<body>
 <!-- Image and text -->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img
          src="{{asset('assets/img/logo.jpg')}}"
          class="me-2"
          height="20"
          alt="MDB Logo"
          loading="lazy"
        />
        <small>Readymix</small>
      </a>
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
        <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center" style="width:35px;height:35px;" >
          @if(Auth()->user()->first_name)
          {{ ucfirst(substr(Auth()->user()->first_name, 0, 1)) }}
          @endif
        </div>
    
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    </div>
    
  </nav>
  