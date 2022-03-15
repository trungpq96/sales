@include('pages.header')
<body>

    <!--====== Preloader Part Start ======-->
    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== Preloader Part Ends ======-->

    <!--====== Navbar Style 7 Part Start ======-->
    @include('pages.nav')
    <!--====== Navbar Style 7 Part Ends ======-->

    <!--====== Breadcrumbs Part Start ======-->
    <section class="breadcrumbs-wrapper pt-50 pb-50 bg-primary-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-style breadcrumbs-style-1 d-md-flex justify-content-between align-items-center">
                        <div class="breadcrumb-left">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                        </div>
                        <div class="breadcrumb-right">
                            <h5 class="heading-5 font-weight-500">About</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Breadcrumbs Part Ends ======-->

    <!--====== Content Card Style 1 Part Start ======-->
    <section class="content-card-wrapper">
        <div class="content-card-style-1">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-6">
                        <div class="content-card-content">
                            <h6 class="sub-title">About eStore</h6>
                            <h2 class="main-title">Welcome to eStore</h2>
                        </div>
                        <div class="content-para pt-20">
                            <p class="mb-15">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti asperiores, expedita eum
                                repellat dolorem quo ratione doloremque quae porro aliquam dolore distinctio, ipsam ipsa repellendus eos ipsum
                                sapiente laudantium corrupti omnis velit minus. Fugiat aliquam dolore omnis sapiente facere quidem repellat ex.
                                Provident quas accusantium vero eligendi nulla sed odit?</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsa repudiandae reprehenderit aperiam aliquam nemo
                                dolor ex pariatur, similique incidunt soluta perferendis rerum fugiat ducimus totam blanditiis optio numquam
                                quia.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-card-image-2 bg_cover" style="background-image: url(./public/assets/img/products/content-2.jpg);"></div>
        </div>
    </section>
    <!--====== Content Card Style 1 Part Ends ======-->

    <!--====== Features Part Start ======-->
    @include('pages.awesome_futures')
    <!--====== Features Part Ends ======-->

    
    <!--====== Footer Style 3 Part Start ======-->
    @include('pages.footer')
    <!--====== Footer Style 3 Part Ends ======-->

  

</body>

</html>
