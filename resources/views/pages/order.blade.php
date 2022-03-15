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

    <!--====== Header Style 1 Part Start ======-->
<section class="h-100 h-custom" style="background-color: #d2c9ff;">
<div class="container" >
  <div class="py-5 text-center">  
    <h2>Checkout</h2>
  </div>
  @if(Auth::check())
  <form action="{{route('order')}}" method="POST">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="row">
    
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        @if(Session::has('cart'))   
        <span class="badge badge-secondary badge-pill">{{Session('cart')->totalQty}}</span>
        @else
        @endif
      </h4>
      <ul class="list-group mb-3">
      @foreach(Session('cart')->items as $product)
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0" >{{$product['item']['name_prd']}}</h6>
            <small class="text-muted">{{$product['qty']}}</small>
          </div>
          <span class="text-muted">${{number_format($product['item']['price'])}}</span>         
        </li>
        @endforeach
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>${{number_format(Session('cart')->totalPrice)}}</strong>
        </li>
      </ul>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
        <input type="text" name="user_id" value="{{Auth::user()->id}}" style="display:none;">
        <div class="mb-3">
          <label for="email">Order Name </label>
          <input type="text" class="form-control" name="name_order" id="name_order" placeholder="Order Name" required>
        </div>

        <div class="mb-3">
          <label for="username">Username</label>
          <input type="text" class="form-control" value="{{Auth::user()->name}}" placeholder="{{Auth::user()->name}}" disabled required>
        </div>

        <div class="mb-3">
          <label for="number_phone">Number Phone </label>
          <input type="text" class="form-control" name="number_phone" id="number_phone" placeholder="Number Phone" required>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
        </div>
   
        <div class="mb-3">
          <label for="attention">Attention</label>
          <input type="text" class="form-control" name="attention" id="attention" placeholder="Attention" required>
        </div>

        <input type="text" name="status" value="Active" style="display:none;">

        <hr/>
        <h4 class="mb-3">Payment</h4>

        <div class="mb-3">
          <label for="payment">Payment</label>
          <select name="payment_id" class="form-control">
                @foreach($pms as $pm)
                <option value="{{$pm->id}}">{{$pm->name_payment}}</option>
                @endforeach
            </select>
        </div>     
        <br>

        <!-- <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Banking</label>
          </div>
        </div> -->
        <!-- <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div> -->
        <!-- <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div> -->
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
    </div>
  </div>
  <br>
  </form>
  @else
  @endif
</div>

    </section>
    <!--====== Header Style 1 Part Ends ======-->

    <!--====== Features Part Start ======-->
    @include('pages.awesome_futures')
    <!--====== Features Part Ends ======-->

    
    <!--====== Footer Style 3 Part Start ======-->
    @include('pages.footer')
    <!--====== Footer Style 3 Part Ends ======-->

</body>
</html>
