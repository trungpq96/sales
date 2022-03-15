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
            <li class="breadcrumb-item text-sm"><a style="text-decoration: none" href="javascript:;" style="text-decoration: none">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a style="text-decoration: none" href="{{route('lst_prd')}}">List Product</a></li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <form class="card-body" action="{{route('prd_search')}}"; method="GET" role="search">
            {{csrf_field()}}
            <div class="input-group input-group-outline">
              <input type="text" id="search" name="search" placeholder="Search..." class="form-control" style="border-radius: 6px;" />
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
            @if(session('message'))
            <div class="col-offset-5 col-12 alter alter-success " style="margin-top: -30px;color: #52AC56;font-size: 20px;font-style: italic;margin-left:45%">
              {{session('message')}}
            </div>
            @endif
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 row">
                  <div class="col-sm-8 col-lg-8"  >
                  <h6 class="text-white text-capitalize ps-3">List Product</h6>
                  </div>
                  <div class="col-sm-4 col-lg-4 row">
                  <div class="col-sm-8 col-lg-8">               
                  </div>
                  <div class="col-sm-1 col-lg-1">
                    <a href="{{route('g_crt_prd')}}"><i class="fas fa-plus-circle btn_prd_css"></i></a>
                  </div>
                  <div class="col-sm-1 col-lg-1">
                    <a data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-file-upload btn_prd_css"></i></a>
                  </div>
                  <div class="col-sm-1 col-lg-1">
                    <a href="{{route('export_prd')}}"><i class="fas fa-file-download btn_prd_css"></i></a>
                  </div>
                  <div class="col-sm-1 col-lg-1">
                    <a href="#" id="delete_multi"><i class="far fa-trash-alt btn_prd_css"></i></a>
                  </div>
                  </div>   
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="ckbAll"></th>    
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name Product</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Type</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price Sale</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create Date</th>
                        <th class="text-secondary opacity-7"></th>
                        <th class="text-secondary opacity-7"></th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($prd as $prdt)
                     <tr id="sid{{$prdt->id}}">
                        <td><input type="checkbox" name="ids" class="sub_chk" data-id="{{$prdt->id}}"/></td>
                        <td>{{$prdt->row}}</td>
                        <td>{{$prdt->name_prd}}</td>
                        <td><img src="./public/images/{{$prdt->image_prd}}" height="50"></td>
                        <td>{{$prdt->prd_type_id}}</td>
                        <td class="price_format">{{$prdt->price}}</td>
                        <td class="price_sale_format">{{$prdt->price_sale}}</td>
                        <td class="align-middle text-center text-sm">
                        @if($prdt->status == 'Active')
                          <span class="badge badge-sm bg-gradient-success">{{$prdt->status}}</span>
                        @else
                          <span class="badge badge-sm bg-gradient-danger">{{$prdt->status}}</span>
                        @endif 
                        </td>
                        <td>{{$prdt->created_at}}</td>
                        <td><a href="{{route('prd_detail',$prdt->id)}}"><i class="fas fa-info-circle"></i></a></td>
                        <td><a href="{{route('g_edit_prd',$prdt->id)}}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="delPrd/{{$prdt->id}}" onclick="return confirm ('Are you sure towant to delete it ?')" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                    <style>
                      .enMoney::after {
                            content:" USD";
                            color:blue;
                        }
                        .negMoney {
                            color:red;
                        }
                        .price_format.negMoney::before {
                            content:'(';
                        }
                        .price_format.negMoney::after {
                            content:' USD)';
                        }
                        .price_sale_format.negMoney::before {
                            content:'(';
                        }
                        .price_sale_format.negMoney::after {
                            content:' USD)';
                        }
                    </style>
                    <script>
                      $('.price_format').each(function () {
                            var item = $(this).text();
                            var num = Number(item).toLocaleString('en');    

                            if (Number(item) < 0) {
                                num = num.replace('-','');
                                $(this).addClass('negMoney');
                            }else{
                                $(this).addClass('enMoney');
                            }
                            
                            $(this).text(num);
                        });
                      
                        $('.price_sale_format').each(function () {
                            var item = $(this).text();
                            var num = Number(item).toLocaleString('en');    

                            if (Number(item) < 0) {
                                num = num.replace('-','');
                                $(this).addClass('negMoney');
                            }else{
                                $(this).addClass('enMoney');
                            }
                            
                            $(this).text(num);
                        });
                    </script>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pagination">{{$prd->links()}}</div>
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Chon file Excel de import</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <form action="{{route('p_import_prd')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" accept=".xlsx, .xls, .csv, .ods" /><br><br>
                <button class="btn btn-primary">Import File</button>
              </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
      <br>
      @include('admin.footer')
    </div>
    <!-- End Content -->
  </main>

  @include('admin.fixedplugin')
  <script src="./public/assets/js/sales/del_multi.js"></script>
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
  <a href="{{route('logout_admin')}}" id="notAuth" >tegdhfghm</a>
  <script>
      jQuery(function(){
        $('#notAuth').trigger('click');
      });
  </script>
  @endif
</body>

</html>