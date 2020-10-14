@extends('layouts.backend')

@section('content')

<div class="row">

    <div class="col-xl-4 col-lg-12 mb-12">
        @include('layouts._messages')
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-4">Dropzone</h5>
                <form action="/file-upload" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                        <input name="file" type="file" multiple />
                        <input name="file" type="file" multiple />
                      </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create New Category
                    <div class="float-sm-right text-zero">
                        <a href="{{ route('product.index') }}" class="btn btn-xs btn-primary">Kembali</a>
                    </div>
                </h5>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <label for="name">details</label>
                </div>


            </div>


        </div>

    </div>


    <div class="col-xl-8 col-lg-12 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Categori</h5>
                <form action="{{route('product.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="SKU">SKU</label>
                        <input type="text" class="form-control" id="SKU" name="sku">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="details">Details</label>
                        <input type="text" class="form-control" id="details" name="details">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" class="form-control" id="qty" name="qty">
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input type="number" class="form-control" id="discount" name="discount">
                    </div>
                    <div class="form-group">
                        <label for="description">Discription</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control select2-single" name="status">
                            <option label="&nbsp;">&nbsp;</option>
                            <option value="active">Active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Category
                                <div class="float-sm-right text-zero">
                                    <button type="button" id="" class="btn btn-xs btn-outline-primary" data-toggle="modal" data-target="#myModal" >Add Categori</button>
                                </div>
                            </h5>
                            <div class="mb-3" id="categories">

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" id="save">Submit</button>
                </form>
            </div>
        </div>
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
        $('.addCategories').click(function () {
            var $id = $(this).attr('data-id');
            $ids = parseInt($id) + 1;
            $idCat = $("#selectCat").val();
            $value = $("#selectCat option:selected").text();
            var $data = `<div class=" a ok_`+ $value +` alert alert-warning alert-dismissible fade show rounded mb-0" style="display:inline-block !importent;" role="alert">
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
    </script>
@endsection


