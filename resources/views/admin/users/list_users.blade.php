@include('admin.header')
<body class="g-sidenav-show  bg-gray-200">
@if(Auth::check())
  @include('admin.menu')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="{{route('lst_users')}}">List Users</a></li>
          </ol>        
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <form class="card-body" action="{{route('search_user')}}"; method="GET" role="search">
          {{ csrf_field() }}
            <div class="input-group input-group-outline">
              <!-- <label class="form-label">Search ...</label> -->
              <input type="text" id="search_user" name="search_user" placeholder="Search..." class="form-control" style="border-radius: 6px;" />
              <button type="submit" style="border: none; margin-left: -35px;background-color: #F0F2F5;"><i class="fas fa-search"></i></button>
            </div>
            </form>
          </div>
        @include('admin.nav')
        </div>
      </div>
    </nav>
    <hr>
    <!-- End Navbar -->
    <!-- Content -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <div><h6 class="text-white text-capitalize ps-3">List Users</h6></div>              
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">               
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>                   
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Position</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($users as $user)                 
                    <tr>
                      <td>{{$user->row}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->number_phone}}</td>
                      <td>{{$user->address}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->name_position}}</td>                       
                      <td>{{$user->created_at}}</td>   
                      <td>{{$user->updated_at}}</td>                  
                      <td><a href="delUsers/{{$user->id}}" onclick="return confirm ('Are you sure towant to delete it ?')" 
                            data-toggle="tooltip"><i class="fas fa-trash-alt"></i></></td>
                    </tr>                   
                    @endforeach
                  </tbody>
                </table>      
              </div>           
            </div>
          </div>
        </div>
        </div>
      </div>
      <div class="paginate">{{$users->links()}}</div>
      <br>
      @include('admin.footer')
    </div>
    <!-- End Content -->
  </main>
  
  @include('admin.fixedplugin')
  <!--   Core JS Files   -->
  <script src="./public/assets/js/core/popper.min.js"></script>
  <script src="./public/assets/js/core/bootstrap.min.js"></script>
  <script src="./public/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./public/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./public/assets/js/plugins/chartjs.min.js"></script>

<!-- <script src="./public/assets/js/sales/master.js"></script> -->
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./public/assets/js/material-dashboard.min.js?v=3.0.0"></script>
  @else
  @endif
</body>

</html>