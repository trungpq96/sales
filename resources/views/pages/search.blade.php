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

    <!-- Start Trending Product Area -->
    <section class="trending-product section" style="margin-top: 12px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Product</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($prds as $prd)
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <a href="{{route('product_detail',$prd->id)}}">
                                <img src="./public/images/{{$prd->image_prd}}" alt="#">
                            </a>
                            <div class="button">
                                <a href="{{route('add-to-cart',$prd->id)}}" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">{{$prd->name_prd_type}}</span>
                            <h4 class="title">
                                <a href="{{route('product_detail',$prd->id)}}">{{$prd->name_prd}}</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>${{number_format($prd->price)}}</span> &ensp; 
                                <span style="text-decoration: line-through;">${{number_format($prd->price_sale)}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->

    <!--====== Features Part Start ======-->
    @include('pages.awesome_futures')
    <!--====== Features Part Ends ======-->

    
    <!--====== Footer Style 3 Part Start ======-->
    @include('pages.footer')
    <!--====== Footer Style 3 Part Ends ======-->

</body>
</html>
