@extends('layouts.frontend') @section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{asset('/assets')}}/images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Collection Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
                        @foreach ($map as $shops)

                            <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                                <div class="product">
                                    <a href="{{route('shop.show', $shops['slug'])}}" class="img-prod"><img class="img-fluid" src="{{asset('/img/kaos.jpg')}}" alt="Colorlib Template">
                                        @if ($shops['discount'] != 0)
                                            <span class="status">{{$shops['discount']}}%</span>
                                        @endif
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="text py-3 px-3">
                                        <h3><a href="{{route('shop.show', $shops['slug'])}}"> {{$shops['name']}} </a></h3>
                                        <div class="d-flex">
                                            <div class="pricing">
                                                <p class="price">
                                                @if ($shops['discount'] != 0)
                                                    <span class="mr-2 price-dc">$ {{$shops['price']}}</span>
                                                @endif
                                                <span class="price-sale"> ${{ $shops['totalPrice']}} </span>
                                                </p>
                                                {{-- <p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p> --}}
                                            </div>

                                            <div class="rating">
                                                <p class="text-right">
                                                @for ($i = 0; $i < (int)$shops['rating']; $i++)
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                @endfor
                                                </p>
                                            </div>
                                        </div>
                                        <form action="{{route('cart.store')}}" method="post" id="addcart">
                                            <p class="bottom-area d-flex px-3">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$shops['id']}}">
                                                <input type="hidden" name="name" value="{{$shops['name']}}">
                                                <input type="hidden" name="qty" value="1">
                                                @if ($shops['discount'] != 0)
                                                <input type="hidden" name="price" value="{{ round((1 - ($shops['discount'] / 100)) * $shops['price'])}}">
                                                @else
                                                <input type="hidden" name="price" value="{{round($shops['price'],2)}}">
                                                @endif
                                                <button type="submit" class="btn btn-black text-center py-2 mr-1" style="border-radius: 0px; font-size: 13px;

                                                text-transform: uppercase;
                                                font-weight: 300;"><span>Add to cart<i class="ion-ios-add ml-1"></i></span></button>
                                                {{-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> --}}
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
		    		</div>
                    {{ $shop->links('layouts.paginate') }}
		    	</div>

		    	<div class="col-md-4 col-lg-2 sidebar">
		    		<div class="sidebar-box-2">
		    			<h2 class="heading mb-4"><a href="#">Clothing</a></h2>
		    			<ul>
		    				<li><a href="#">Shirts &amp; Tops</a></li>
								<li><a href="#">Dresses</a></li>
								<li><a href="#">Shorts &amp; Skirts</a></li>
								<li><a href="#">Jackets</a></li>
								<li><a href="#">Coats</a></li>
								<li><a href="#">Sleeveless</a></li>
								<li><a href="#">Trousers</a></li>
								<li><a href="#">Winter Coats</a></li>
								<li><a href="#">Jumpsuits</a></li>
		    			</ul>
		    		</div>
		    		<div class="sidebar-box-2">
		    			<h2 class="heading mb-4"><a href="#">Jeans</a></h2>
		    			<ul>
		    				<li><a href="#">Shirts &amp; Tops</a></li>
								<li><a href="#">Dresses</a></li>
								<li><a href="#">Shorts &amp; Skirts</a></li>
								<li><a href="#">Jackets</a></li>
								<li><a href="#">Coats</a></li>
								<li><a href="#">Jeans</a></li>
								<li><a href="#">Sleeveless</a></li>
								<li><a href="#">Trousers</a></li>
								<li><a href="#">Winter Coats</a></li>
								<li><a href="#">Jumpsuits</a></li>
		    			</ul>
		    		</div>
		    		<div class="sidebar-box-2">
		    			<h2 class="heading mb-2"><a href="#">Bags</a></h2>
		    			<h2 class="heading mb-2"><a href="#">Accessories</a></h2>
		    		</div>
						<div class="sidebar-box-2">
		    			<h2 class="heading mb-4"><a href="#">Shoes</a></h2>
		    			<ul>
		    				<li><a href="#">Nike</a></li>
								<li><a href="#">Addidas</a></li>
								<li><a href="#">Skechers</a></li>
								<li><a href="#">Jackets</a></li>
								<li><a href="#">Coats</a></li>
								<li><a href="#">Jeans</a></li>
		    			</ul>
		    		</div>
    			</div>
    		</div>
    	</div>
    </section>
@endsection
@section('footer')
<script>
    document.getElementById("submit_cart").onclick = function() {
        document.getElementById("addcart").submit();
    }
</script>
@endsection
