
<div class="custom-container container-fluid p-0" >
  <div class="sidebar-29-05-2023 d-flex flex-column flex-shrink-0 p-3 bg-light" >
 
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link link-dark" >
          <i class="fa fa-dashboard mx-2"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="/order/orderRequest" class="nav-link  {{ request()->is('order*') ? 'bg-primary text-white ' : 'link-dark' }}">
          <i class="fa fa-shopping-cart mx-2"></i>
          Order Request
        </a>
      </li>
      <li class="nav-item">
        <a href="/product/productList" class="nav-link  {{ request()->is('product*') ? 'bg-primary text-white ' : 'link-dark' }}">
          <i class="fa fa-cube mx-2"></i>
          Product
        </a>
      </li>
      <li class="nav-item">
        <a href="/service/serviceList" class="nav-link {{ request()->is('service*') ? 'bg-primary text-white ' : 'link-dark' }}">
          <i class="fa fa-cogs mx-2"></i>
          Services
        </a>
      </li>
      <li class="nav-item">
        <a href="/overall/overallList" class="nav-link {{ request()->is('overall*') ? 'bg-primary text-white ' : 'link-dark' }}">
 
          <i class="fa fa-bar-chart mx-2"></i>
          Overall Orders
        </a>
      </li>
    </ul>
    <hr class="my-4">
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle gap-2" id="dropdownUser2" data-mdb-toggle="dropdown" aria-expanded="false">
        <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center" style="width:35px;height:35px;" >
          @if(Auth()->user()->first_name)
            {{ ucfirst(substr(Auth()->user()->first_name, 0, 1)) }}
            @endif
          </div>
<strong >@if(Auth()->user()->first_name)
          {{ ucfirst(Auth()->user()->first_name) }}
          @endif</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
  
  <div class="workstation-29-05-2023 m-3">
  
 
