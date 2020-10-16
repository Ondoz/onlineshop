@extends('layouts.backend')
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 mb-12">
        @include('layouts._messages')
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-4">Dropzone
                    <div class="float-sm-right text-zero">a
                    </div>
                </h5>
                <div class="container" >
                    <div class='content'>
                        <div class="row">
                            <div class="col-md-12">
                            {!! Form::open([ 'route' => [ 'upload.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
                                <div class="fallback" id="myId">
                                 <input  name="file" type="file" multiple />
                              </div>
                            {!! Form::close() !!}
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
       
        @if (!empty($product))
        <form action="{{route('product.update', $product->id)}}" method="post">
            @method('PUT')
        @else
        <form action="{{route('product.store')}}" method="post">
        @endif
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Informasi Product</h5>
                    @csrf
                    <div class="form-group row">
                        <label for="sku" class="col-sm-4 col-form-label"> <Strong>SKU (Stock Keeping Unit)</Strong>  <br> <br>
                            Gunakan kode unik SKU jika kamu ingin menandai produkmu.
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="sku" class="form-control" id="sku" value="{!! (!empty($product) ? $product->sku :  old('sku') ); !!}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"> <Strong>Nama Product</Strong>  <br> <br>
                            Nama min. 5 kata, dan tidak terdiri dari jenis produk, merek, dan keterangan seperti warna, bahan, atau tipe.
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" id="inputEmail3"  value="{!! (!empty($product) ? $product->name :  old('name') ); !!}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-4 col-form-label"> <Strong>Description</Strong>  <br> <br>
                            terdiri dari jenis produk, merek, dan keterangan seperti warna, bahan, atau tipe.
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="description" class="form-control" id="description"  value="{!! (!empty($product) ? $product->description :  old('description') ); !!}">
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title"> <h5>Category</h5> 
                        <span class="badge badge-xs badge-dark mb-1">Wajib</span>
                        <div class="float-sm-right text-zero">
                            <button type="button" id="" class="btn btn-xs btn-outline-primary" data-toggle="modal" data-target="#myModal" >Add Categori</button>
                        </div>
                    </div>
                    <div class="mb-3" id="categories">
                        @if (!empty($product))    
                            @foreach ($product->categories as $item)
                            <div class=" a ok_{{$item->name}} alert alert-light alert-dismissible fade show rounded mb-0" style="display:inline-block;" role="alert">
                                <strong>{{$item->name}}</strong>
                                <button type="button" class="close catDel" data-id="{{$product->id}}" data-idc="{{$item->id}}" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <input type="hidden" name="categories[]" value="{{$item->id}}">
                            </div>
                            @endforeach
                        @endif
                            

                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Details Product</h5>
                
                    <div class="form-group row">
                        <label for="price" class="col-sm-4 col-form-label"> <Strong>Price</Strong>  <br>
                            Harga barang yang akan di jual
                        </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="Qty" class="col-sm-4 col-form-label"> <Strong>Qty</Strong>  <br>
                            Jumlah atau Stok yang tersedia 
                        </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="Qty" name="qty" value="{!! (!empty($product) ? $product->qty :  old('qty') ); !!}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Discount" class="col-sm-4 col-form-label"> <Strong>Discount</Strong>  <br> <br>
                            Discount bisa di kosongkan dan tidak karna ini di peruntukan jika anda ingin memberi discount 
                        </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="Discount" name="discount" value="{!! (!empty($product) ? $product->discount :  old('discount') ); !!}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Status" class="col-sm-4 col-form-label"> <Strong>Status</Strong>  <br> 
                            Jika status aktif, produkmu dapat dicari oleh calon pembeli.
                        </label>
                        <div class="col-sm-8">
                            <select class="form-control select2-single" name="status" value="{!! (!empty($product) ? $product->status :  old('status') ); !!}">
                                <option label="&nbsp;">&nbsp;</option>
                                <option value="active">Active</option>
                                <option value="inactive">inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-3">
                    <a href="{{ route('product.index') }}" class="btn btn-light default mr-1 w-100"><strong>Batal</strong></a>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary default w-100" id="save"><Strong>Simpan</Strong></button>
                </div>
            </div>
            <div class="float-sm-right text-zero">
            </div>
        </form>       
    </div>
  <!-- The Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true"  >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalContentLabel">Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control select2-single select2-hidden-accessible"  id="selectCat" tabindex="-1" aria-hidden="true">
                        <option label="&nbsp;">--Option Categories--</option>
                       @foreach ($categories as $key => $item)
                           <option value="{{$item->id}}">{{$item->name}}</option>
                       @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-xs btn-primary addCategories" data-id="0">Add Categories</button>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('js')
    <script>
        var myDropzone = new Dropzone("div#myId", { url: "{{route('upload.store')}}"});
      
        $('.addCategories').click(function () {
            var $id = $(this).attr('data-id');
            $ids = parseInt($id) + 1;
            $idCat = $("#selectCat").val();
            $value = $("#selectCat option:selected").text();
            var $data = `<div class=" a ok_`+ $value +` alert alert-light alert-dismissible fade show rounded mb-0" style="display:inline-block;" role="alert">
                            <strong>`+ $value +`</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <input type="hidden" name="categories[]" value="`+ $idCat +`">
                        </div>
                        `
            if ($('div').hasClass('ok_'+ $value)) {
               alert("Category already available");
            }else{
                $('#categories').append($data);
                $('.addCategories').attr('data-id', $ids);
            }
        });
        // url : 'admin/productCat/' + $id + '/' + $idc,

        $('.catDel').click(function() {
            var $id = $(this).attr('data-id');
            var $idc  = $(this).attr('data-idc');
            $.ajax({
                url : '{{route("json.procat_distroy")}}',
                type: 'post',
                data: {
                    token: '{{ csrf_token() }}',
                    product_id: $id,
                    categories_id: $idc
                },
                dataType: "JSON",
                success: function(e){
                    console.log(e);
                }
            });
        })

  
    </script>
@endsection


