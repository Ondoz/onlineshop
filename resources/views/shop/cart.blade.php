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
                                <th>Quantity</th>
                                <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
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

                                    <td class="price">${{$item->price}}</td>
                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                        <input type="text" name="quantity" class="quantity form-control input-number subtotalInput qty" value="{{$item->qty}}" min="1" max="100">
                                    </div>
                                    </td>

                                    <td class="total">${{$item->price * $item->qty}}</td>
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
                        <span>${{Cart::subtotal()}}</span>
                    </p>

                    <p class="d-flex">
                        <span>Discount</span>
                       <span class="fr totalBayar">0</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>${{Cart::total()}}</span>
                    </p>
                </div>
                <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
        </div>

    </section>
@endsection
@section('js')
    <script>
        function sumSubtotal()
        {
            var $sumDebit = 0;
            $('.subtotalInput').each(function() {
                var $value = $(this).val();
                $sumDebit += parseFloat($value);
            });
            $total = $.number($sumDebit);
            $('.totalCalc').html($total);
        }

        function classChange($uuid, $harga, $qty)
        {
            $now = $('.qtyItems_'+$uuid).val();
            $totalShow = parseInt($qty) * parseInt($harga);

            $('.qtyItems_'+$uuid).val($qty);
            $('.subtotal_'+$uuid).html('Rp'+$.number($totalShow));
            $('.subtotalInput_'+$uuid).val($totalShow);
        }


        $('#tableItems').on('input', '.qty', function(){
            var $uuid = $(this).attr('data-id');
            var $val = $(this).val();
            var $harga = $('.harga_'+$uuid).val();
            if ($val === '0' || $val === '') {
                $(this).val('1');
                $val = 1;
                console.log('Noll');
            } else {

            }

            classChange($uuid, $harga, parseInt($val));
            sumSubtotal();
        });
    </script>
@endsection
