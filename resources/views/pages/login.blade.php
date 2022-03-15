<link rel="stylesheet" href="./public/assets/css/bootstrap.min.css">
<script src="./public/assets/js/core/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
<link href="./public/assets/css/page_sales/login.css" rel="stylesheet">
<div class="wrapper">
    <div class="card">
        <form action="{{route('login')}}" method="POST" role="form" class="d-flex flex-column">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="h3 text-center text-white">Login</div>
            <div class="d-flex align-items-center input-field my-3 mb-4"> 
                <span class="far fa-user p-2"></span> 
                <input type="text" name="email" placeholder="Username or Email" required class="form-control"> 
            </div>
            <div class="d-flex align-items-center input-field mb-4"> 
                <span class="fas fa-lock p-2"></span> 
                <input type="password" name="password" placeholder="Password" required class="form-control" id="pwd"> 
                <button class="btn" onclick="showPassword()"> <span class="fas fa-eye-slash"></span> </button> 
            </div>
            <div class="d-sm-flex align-items-sm-center justify-content-sm-between">
                <div class="d-flex align-items-center"> 
                    <label class="option"> <span class="text-light-white">Remember Me</span> 
                    <input type="checkbox" checked> <span class="checkmark"></span> </label> 
                </div>
                <div class="mt-sm-0 mt-3"><a href="#">Forgot password?</a></div>
            </div>
            <div class="my-3"> <input type="submit" value="Login" class="btn btn-primary"> </div>
            <div class="mb-3"> <span class="text-light-white">Don't have an account?</span> <a href="#">Sign Up</a> </div>
            <div class="text-center"><input type="text" name="position_id" value="2" style="display: none;"></div>
            <div class="text-center"><input type="text" name="status" value="Active" style="display: none;"></div>
        </form>
        <div class="position-relative border-bottom my-3 line"> <span class="connect">or connect with</span> </div>
        <div class="text-center py-3 connections"> <a href="https://wwww.facebook.com" target="_blank" class="px-2"> <img src="https://www.dpreview.com/files/p/articles/4698742202/facebook.jpeg" alt=""> </a> <a href="https://www.google.com" target="_blank" class="px-2"> <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png" alt=""> </a> <a href="https://www.github.com" target="_blank" class="px-2"> <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png" alt=""> </a> </div>
    </div>
</div>

<script src="./public/assets/js/page_sales/show_pass.js" type="text/javascript"></script>