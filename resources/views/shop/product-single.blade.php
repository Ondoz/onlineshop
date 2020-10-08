@extends('layouts.frontend') @section('content')

    <div class="hero-wrap hero-bread" style="background-image: url('{{asset('/assets')}}/images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="{{asset('/img/kaos.jpg')}}" alt="Colorlib Template">
                            @if ($product->discount != 0)
                                <span class="status">{{$product->discount}}%</span>
                            @endif
                            <div class="overlay"></div>
                        </a>
                    </div>
                </div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{$product->name}}</h3>
    				<div class="rating d-flex">
                        <a href="#" class="mr-2">{{$rating}}</a>
                        <p class="text-left mr-4">
                        @for ($i = 0; $i < (int)$rating; $i++)
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                        @endfor
                        </p>
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2" style="color: #000;">{{$product->reviews->count()}} <span style="color: #bbb;">Rating</span></a>
                        </p>
                        <p class="text-left">
                            <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                        </p>
                    </div>
                    <div class="product">
                        <div class="text py-3 px-3">
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price">
                                        @if ($product->discount != 0)
                                            <span class="mr-2 price-dc">${{round($product->price,2)}}</span>
                                        @endif
                                        <span class="price-sale"> ${{ round((1 - ($product->discount / 100)) * $product->price)}} </span>
                                    </p>
                                </div>
                            </div>
                        </div>
					</div>
					<h2>Descrption</h2>
					<p>{{$product->descrption}}</p>
					<h2>Details</h2>
					<p>{{$product->details}}</p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <p class="price"><span>{{$product->PresetPrice}}</span></p>
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">Small</option>
                                        <option value="">Medium</option>
                                        <option value="">Large</option>
                                        <option value="">Extra Large</option>
                                    </select>
	                            </div>
		                    </div>
						</div>
						<div class="w-100"></div>
						<div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                                <i class="ion-ios-remove"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
	          	        </div>
	          	        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;">{{$product->stock}} piece available</p>
                        </div>
          	        </div>

                      <form action="{{route('cart.store')}}" method="post" name="addcart">
                            {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->name}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <p><a href='#' onclick='document.forms["addcart"].submit(); return false;' class="btn btn-black py-3 px-5">Add to Cart</a></p>
                    </form>
    			</div>
    		</div>
    	</div>
		<div class="container testimony-section">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate">
					<h2 class="mb-4">Our satisfied customer says</h2>
					<p>
						Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="carousel-testimony owl-carousel">
						@foreach ($product->reviews->take(5) as $item)
							@if ($item->star != 0)
								<div class="item">
									<div class="testimony-wrap p-4 pb-5">
										<div class="user-img mb-5" style="background-image: url({{asset("/assets")}}/images/person_1.jpg)">
											<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
											</span>
										</div>
										<div class="text">
											<p class="mb-5 pl-4 line">
												{{ limit_word($item->review,10) }}
											</p>
											<p class="name">{{$item->customer}}</p>
											@for ($i = 0; $i < (int)$item->star; $i++)
												<a href="#"><span class="ion-ios-star-outline"></span></a>
											@endfor
										</div>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
			@if ($product->reviews->count() > 5)	
			<div class="row justify-content-center mt-3 pb-3">
				<div class="col-md-8s heading-section ftco-animate">
					<p><a href='#' onclick='document.forms["addcart"].submit(); return false;' class="btn btn-black py-3 px-5 mb-4">Show All Response</a></p>
				</div>
			</div>
			@endif
		</div>
	</section>

    <section class="ftco-section bg-light">
    	<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 class="mb-4">Ralated Products</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="{{asset('/assets')}}/images/product-1.jpg" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Floral Jackquard Pullover</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    							</p>
	    						</div>
	    					</div>
	    					<p class="bottom-area d-flex px-3">
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="{{asset('/assets')}}/images/product-2.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Floral Jackquard Pullover</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<p class="bottom-area d-flex px-3">
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="{{asset('/assets')}}/images/product-3.jpg" alt="Colorlib Template">
	    					<div class="overlay"></div>
	    				</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Floral Jackquard Pullover</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<p class="bottom-area d-flex px-3">
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="{{asset('/assets')}}/images/product-4.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Floral Jackquard Pullover</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<p class="bottom-area d-flex px-3">
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
@endsection
