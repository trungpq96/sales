@include('admin.header')
<body class="g-sidenav-show  bg-gray-200">
    @include('admin.menu')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Supplier</li>
                    </ol>
                </nav>
                @include('admin.nav')
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
                                <h6 class="text-white text-capitalize ps-3">Edit Supplier</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-6 my-0">             
                                    <form action="{{route('edit_supplier',$supplier->id)}}"  method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="mb-3 mt-3">
                                            <label for="name_supplier" class="form-label">Name Supplier : </label>
                                            <input type="text" class="form-control" id="name_supplier"
                                                placeholder="Name Supplier" name="name_supplier"
                                                value="{{$supplier->name_supplier}}">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="email_supplier" class="form-label">Email Supplier : </label>
                                            <input type="text" class="form-control" id="email_supplier"
                                                placeholder="Email Supplier" name="email_supplier"
                                                value="{{$supplier->email_supplier}}">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="address_supplier" class="form-label">Address Supplier : </label>
                                            <input type="text" class="form-control" id="address_supplier"
                                                placeholder="Address Supplier" name="address_supplier"
                                                value="{{$supplier->address_supplier}}">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="website" class="form-label">Website : </label>
                                            <input type="text" class="form-control" id="website"
                                                placeholder="Website" name="website"
                                                value="{{$supplier->website}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status : </label>
                                            <select class="form-select" id="status" name="status" >
                                                <option value="Active" {{ $supplier->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="InActive" {{ $supplier->status == 'InActive' ? 'selected' : '' }}>InActive</option>
                                            </select>
                                        </div>
                                        <button type="submit"
                                            class="btn bg-gradient-primary w-20 my-4 mb-2">Submit</button>
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
    <script src="./public/assets/js/core/popper.min.js"></script>
    <script src="./public/assets/js/core/bootstrap.min.js"></script>
    <script src="./public/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./public/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./public/assets/js/plugins/chartjs.min.js"></script>

    <script src="./public/assets/js/sales/master.js"></script>
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
</body>

</html>