@extends('layouts.frontend') @section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{asset('/assets')}}/images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section ftco-cart">
        <div class="container">
            @include('layouts._messages')
            @if (Cart::count() > 0 )
            <h2>{{Cart::count()}} item(s) in Shopping Cart</h2>
                <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table" id="tableItems">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                </valr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $key => $item)
                                <tr class="text-center">
                                    <form action="{{route('cart.destroy', $item->rowId)}}" method="POST" name="remotecart">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <td class="product-remove"><a href="#" onclick='document.forms["remotecart"].submit(); return false;'><span class="ion-ios-close"></span></a></td>
                                    </form>

                                    <td class="image-prod"><div class="img" style="background-image:url({{asset('/assets/images/product-1.jpg')}}"></div></td>

                                    <td class="product-name">
                                        <h3>{{$item->model->name}}</h3>
                                        <p>{{$item->model->details}}</p>
                                    </td>
                                    <td class="" name="price[]">
                                        <h5>
                                            <span>$</span>
                                            <span class="price price_{{$item->rowId}}">{{$item->price}}</span>
                                        </h5> 
                                    </td>
                                    <td class="size">
                                        <h5>
                                            <span>{{ucfirst($item->options->size)}}</span>
                                        </h5>
                                    </td>
                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                        <input type="number"  name="qty[]" data-id="{{$item->rowId}}" class="quantity form-control input-number subtotalInput qty qty_{{$item->rowId}}" value="{{$item->qty}}" min="1" >
                                    </div>
                                    </td>

                                    <td class="fr"><h5><span>$</span><span class="total total_{{$item->rowId}}">{{$item->price * $item->qty}}</span></h5></td>
                                </tr><!-- END TR-->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <h3>No items in Cart</h3>
            @endif
        </div>


        <div class="row justify-content-center">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        $ <span class="totalCalc">{{Cart::subtotal()}}</span>
                    </p>
                    <hr>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span class="">0</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price ">
                        <span>Total</span>$<span class="totalBayar"> {{Cart::subtotal()}}</span>
                    </p>
                    <form action="{{route('checkout.store')}}" method="post" name="addOrder">
                        {{csrf_field()}}
                        @foreach (Cart::content() as $item)
                            <input type="hidden" name="name[]" value="{{$item->model->name}}">
                            <input type="hidden" name="qty[]" value="{{$item->qty}}">
                            <input type="hidden" name="size[]" value="{{$item->options->size}}">
                            <input type="hidden" name="price[]" value="{{$item->model->price}}">
                        @endforeach
                        <input type="hidden" class="totalQty" name="total_qty" value="{{Cart::count()}}" >
                        <input type="hidden" class="totalPrice" name="total_price" value="{{Cart::subtotal()}}" >
                        <p class="text-center"><a href='#' onclick='document.forms["addOrder"].submit(); return false;' class="btn btn-black py-3 px-5">Proceed to Checkout</a></p>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('js')
    <script>

        function sumQty()
        {
            var $sum = 0;
            $('.qty').each(function(){
                var $value = $(this).val();
                $sum += parseFloat($value);
                $total = $sum;
            })
            // console.log($total);
            $('.totalQty').val($total);
        }

        function sumSubtotal()
        {
            var $sum =  0;
            $('.total').each(function(){
                var $value = $(this).html();
                $sum += parseFloat($value);
                $total = $sum;
            })
            $('.totalCalc').html($total);
            $('.totalBayar').html($total);
            $('.totalPrice').val($total);
        }

        $('#tableItems').on('input', '.qty', function(){
            var $id = $(this).attr('data-id');
            var $val = $(this).val();
            var $harga = $('.price_' + $id).html();

            if ($val === '0' || $val === '') {
                $('.total_' + $id).html(0);
            } else {
                $('.total_' + $id).html($harga * $val);
            }
            sumSubtotal();
            sumQty();
        });
    </script>
@endsection
