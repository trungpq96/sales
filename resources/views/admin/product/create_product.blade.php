@include('admin.header')

<body class="g-sidenav-show  bg-gray-200">
    @include('admin.menu')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true" >
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Create Product</li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <!-- <form class="card-body" action="{{route('search')}}" method="GET" role="search">
                            {{ csrf_field() }}
                            <div class="input-group input-group-outline">
                                <label class="form-label">Search ...</label> -->
                                <!-- <input type="text" id="search" name="search" placeholder="Search..." class="form-control" style="border-radius: 6px;" />
                                <button type="submit" style="border: none; margin-left: -35px;background-color: #F0F2F5;"><i class="fas fa-search"></i></button>
                            </div> -->
                        <!-- </form> -->
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
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Create Product</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-6 my-0"  style="margin-top: -3% !important;">
                                <form action="{{route('crt_prd')}}" method="POST" role="form" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="row">
                                        <div class="col-lg-3 row">
                                            <div class="col-lg-4" id="smartphone" style="text-align: center;"><span class="show-btn" id="smartphone_click"><i class="fas fa-mobile-alt"></i></span></div>
                                            <div class="col-lg-4" id="computer" style="text-align: center;"><span class="show-btn" id="computer_click"><i class="fas fa-laptop"></i></span></div>
                                            <div class="col-lg-4" id="smartwatch" style="text-align: center;"><span class="show-btn" id="smartwatch_click"><i class="far fa-clock"></i></span></div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3 mt-3">
                                            <label for="name_prd" class="form-label">Name Product : </label>
                                            <input type="text" class="form-control" id="name_prd" placeholder="Name Product" name="name_prd">
                                        </div>

                                        <div class="col-lg-6 mb-3 mt-3">
                                            <label for="prd_type_id" class="form-label">Product Type : </label>
                                            <select name="prd_type_id" class="form-control">
                                                @foreach($product_type as $prd_type)
                                                <option value="{{$prd_type->id}}">{{$prd_type->name_prd_type}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                 
                                        <!-- <div class="col-lg-4 mb-3 mt-3 ">
                                            <label for="image_prd" class="form-label">Image Product Detail : </label><br>
                                            <div class="input-group hdtuto control-group lst increment" >
                                                <input type="file" name="image_prd_detail[]" class="myfrm form-control">
                                                <div class="input-group-btn"> 
                                                    <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                </div>
                                            </div>
                                            <div class="clone hide">
                                                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                                    <input type="file" name="image_prd_detail[]" class="myfrm form-control">
                                                    <div class="input-group-btn"> 
                                                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                               
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 mb-3 mt-3 ">
                                                <label for="image_prd" class="form-label">Image Product : </label><br>
                                                <input type="file" name="image_prd">
                                        </div>
                                        <div class="col-lg-4 mb-3 mt-3 ">
                                                <label for="image_prd" class="form-label">Image Product View : </label><br>
                                                <div class="increment" >
                                                    <input type="file" name="image_prd_view[]">
                                                    <button class="btn btn-success add_img_view" type="button"><i class="fas fa-plus-circle"></i></button>
                                                </div>
                                                <div class="clone hide">
                                                    <div class="hdtuto" style="margin-top:5px">
                                                        <input type="file" name="image_prd_view[]">
                                                        <button class="btn btn-danger remove_img_view" type="button"><i class="fas fa-minus-circle"></i></button>
                                                    </div>
                                                </div>                                      
                                        </div>
                                        <div class="col-lg-4 mb-3 mt-3 ">
                                                <label for="image_prd" class="form-label">Image Product Detail : </label><br>
                                                <div class="increment1" >
                                                    <input type="file" name="image_prd_detail[]">
                                                    <button class="btn btn-success add_img_detail" type="button"><i class="fas fa-plus-circle"></i></button>
                                                </div>
                                                <div class="clone1 hide">
                                                    <div class="hdtuto1" style="margin-top:5px">
                                                        <input type="file" name="image_prd_detail[]">
                                                        <button class="btn btn-danger remove_img_detail" type="button"><i class="fas fa-minus-circle"></i></button>
                                                    </div>
                                                </div>                                      
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 mb-3 mt-3">
                                            <label for="price" class="form-label">Price Product : </label>
                                            <input type="text" class="form-control" id="price" placeholder="Price Product" name="price">
                                        </div>
                                        <div class="col-lg-4 mb-3 mt-3">
                                            <label for="price_sale" class="form-label">Price Sale Product : </label>
                                            <input type="text" class="form-control" id="price_sale" placeholder="Price Sale Product" name="price_sale">
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <label for="status" class="form-label">Status : </label>
                                            <select class="form-select" id="status" name="status">
                                                <option>Active</option>
                                                <option>InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="col-lg-12" id="display_view" style="display:none">

                                        <div class="row">
                                            <div class="col-lg-4 mb-3 mt-3" id="supplier" style="display:none">
                                                <label for="supplier_id" class="form-label">Supplier : </label>
                                                <select name="supplier_id" class="form-control">
                                                    @foreach($supplier as $sl)
                                                    <option value="{{$sl->id}}">{{$sl->name_supplier}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-4 mb-3 mt-3" id="date_manufacture" style="display:none">
                                                <label for="date_manufacture" class="form-label">Date Manufacture : </label>
                                                <input type="date" class="form-control" placeholder="Date Manufacture" name="date_manufacture">
                                            </div>
                                            <div class="col-lg-4 mb-3 mt-3" id="utilities" style="display:none">
                                                <label for="utilities" class="form-label">Utilities : </label>
                                                <input type="text" class="form-control" placeholder="Utilities" name="utilities">
                                            </div>                                   
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12" >
                                                    <label for="description" class="form-label">Description : </label>
                                                    <textarea class="form-control" rows="5" name="description" ></textarea>
                                                    <script>CKEDITOR.replace('description');</script>
                                             </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 mb-3 mt-3" id="screen" style="display:none">
                                                <label for="screen" class="form-label">Screen : </label>
                                                <input type="text" class="form-control" placeholder="Screen" name="screen">
                                            </div>
                                            <div class="col-lg-3 mb-3 mt-3" id="front_camera" style="display:none">
                                                <label for="front_camera" class="form-label">Front Camera : </label>
                                                <input type="text" class="form-control" placeholder="Front Camera" name="front_camera">
                                            </div>
                                            <div class="col-lg-3 mb-3 mt-3" id="rear_camera" style="display:none">
                                                <label for="rear_camera" class="form-label">Rear Camera : </label>
                                                <input type="text" class="form-control" placeholder="Rear Camera" name="rear_camera">
                                            </div>
                                            <div class="col-lg-3 mb-3 mt-3" id="system" style="display:none">
                                                <label for="system" class="form-label">System : </label>
                                                <input type="text" class="form-control" placeholder="System" name="system">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 mb-3 mt-3" id="cpu" style="display:none">
                                                <label for="cpu" class="form-label"> Cpu : </label>
                                                <input type="text" class="form-control" placeholder="cpu" name="cpu">
                                            </div>
                                            <div class="col-lg-3 mb-3 mt-3" id="card" style="display:none">
                                                <label for="card" class="form-label">Card : </label>
                                                <input type="text" class="form-control" placeholder="Card" name="card">
                                            </div>
                                            <div class="col-lg-3 mb-3 mt-3" id="ram" style="display:none">
                                                <label for=" ram " class="form-label"> Ram : </label>
                                                <input type="text" class="form-control" placeholder="ram" name="ram">
                                            </div>
                                            <div class="col-lg-3 mb-3 mt-3" id="storage" style="display:none">
                                                <label for="storage" class="form-label">Storage : </label>
                                                <input type="text" class="form-control" placeholder="storage" name="storage">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 mb-3 mt-3" id="connect" style="display:none">
                                                <label for="connect" class="form-label">Communicate & Connect : </label>
                                                <input type="text" class="form-control" placeholder="Communicate & Connect" name="connect">
                                            </div>
                                            <div class="col-lg-3 mb-3 mt-3" id="pin" style="display:none">
                                                <label for="pin" class="form-label">Battery & charging : </label>
                                                <input type="text" class="form-control" placeholder="Battery & charging technology" name="pin">
                                            </div>
                                            <div class="col-lg-3 mb-3 mt-3" id="design" style="display:none">
                                                <label for="design" class="form-label">Design & Weight : </label>
                                                <input type="text" class="form-control" placeholder="Design & Weight" name="design">
                                            </div>
                                            <div class="col-lg-3 mb-3 mt-3" id="info" style="display:none">
                                                <label for="info" class="form-label">Other Infomation : </label>
                                                <input type="text" class="form-control" placeholder="Other Infomation" name="info">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn bg-gradient-primary w-20 my-4 mb-2">Submit</button>
                            </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('admin.footer')
        </div>
        <!-- End Content -->
    </main>

    @include('admin.fixedplugin')
    <!--   Core JS Files   -->
    <script src="./public/assets/js/sales/show_type_product.js" type="text/javascript"></script>
    <script src="./public/assets/js/core/popper.min.js"></script>
    <script src="./public/assets/js/core/bootstrap.min.js"></script>
    <script src="./public/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./public/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./public/assets/js/plugins/chartjs.min.js"></script>

    <!-- <script src="./public/assets/js/sales/master.js"></script> -->


    <script>
    $(document).ready(function() {
        //
        $(".add_img_view").click(function(){ 
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });
        $("body").on("click",".remove_img_view",function(){ 
            $(this).parents(".hdtuto").remove();
        });
        //
        $(".add_img_detail").click(function(){ 
            var lsthmtl1 = $(".clone1").html();
            $(".increment1").after(lsthmtl1);
        });
        $("body").on("click",".remove_img_detail",function(){ 
            $(this).parents(".hdtuto1").remove();
        });
        });
        //
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
</body>

</html>