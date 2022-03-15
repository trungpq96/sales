
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" #" target="_blank">
        <img src="./public/assets/img/logos/logo.png" class="navbar-brand-img h-200" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Sales</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="index-admin">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('lst_prd')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">table_view</i> -->
              <i class="fab fa-product-hunt "></i>
            </div>
            <span class="nav-link-text ms-1">Product</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('lst_prd_type')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">receipt_long</i> -->
              <i class="fas fa-project-diagram"></i>
            </div>
            <span class="nav-link-text ms-1">Product Type</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('lst_supplier')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">view_in_ar</i> -->
              <i class="fas fa-building"></i>
            </div>
            <span class="nav-link-text ms-1">Supplier</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('lst_order')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">format_textdirection_r_to_l</i> -->
              <i class="fas fa-shopping-cart"></i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('lst_payment')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">format_textdirection_r_to_l</i> -->
              <i class="far fa-credit-card"></i>
            </div>
            <span class="nav-link-text ms-1">Payment</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('lst_users')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">format_textdirection_r_to_l</i> -->
              <i class="fas fa-users"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('lst_position')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">format_textdirection_r_to_l</i> -->
              <i class="fas fa-shield-alt"></i>
            </div>
            <span class="nav-link-text ms-1">Position</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('file_upload')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">format_textdirection_r_to_l</i> -->
              <i class="fas fa-database"></i>
            </div>
            <span class="nav-link-text ms-1">Storage</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('email')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">format_textdirection_r_to_l</i> -->
              <i class="fas fa-envelope-open-text"></i>
            </div>
            <span class="nav-link-text ms-1">Email</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div>
  </aside>

