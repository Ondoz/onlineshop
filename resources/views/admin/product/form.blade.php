@extends('layouts.backend')

@section('content')

<div class="row">

    <div class="col-xl-4 col-lg-12 mb-12">
        @include('layouts._messages')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create New Category
                    <div class="float-sm-right text-zero">
                        <a href="{{ route('product.index') }}" class="btn btn-xs btn-primary">Kembali</a>
                    </div>
                </h5>


                   {{-- @method("put") --}}
                    <div class="form-group">
                        <label for="name">gambar</label>
                    </div>
                    <div class="form-group">
                        <label for="name">details</label>
                    </div>

                </form>
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
                                    <button type="button" id="" class="btn btn-xs btn-primary addCategories" data-id="0">Add Categori</button>
                                </div>
                            </h5>
                            <div class="mb-3" id="categories">
                                <a href="#">
                                    <span class="badge badge-pill badge-outline-theme-2 mb-1">Flour</span>
                                </a>
                                <a href="#">
                                    <span class="badge badge-pill badge-outline-theme-2 mb-1">Chocolate</span>
                                </a>
                                <a href="#">
                                    <span class="badge badge-pill badge-outline-theme-2 mb-1">Caster
                                        Sugar</span>
                                </a>
                                <a href="#">
                                    <span class="badge badge-pill badge-outline-theme-2 mb-1">Baking
                                        Powder</span>
                                </a>
                                <a href="#">
                                    <span class="badge badge-pill badge-outline-theme-2 mb-1">Milk</span>
                                </a>
                                <a href="#">
                                    <span class="badge badge-pill badge-outline-theme-2 mb-1">Eggs</span>
                                </a>
                                <a href="#">
                                    <span class="badge badge-pill badge-outline-theme-2 mb-1">Vegetable
                                        Oil</span>
                                </a>

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" id="save">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
@section('js')
    <script>
        $('.addCategories').click(function () {
            var $id = 0;
            $ids = parseInt($id) + 1;
            var $data = `<a href="#">
                            <span class="badge badge-pill badge-outline-theme-2 mb-1">Flour</span>
                        </a>`
            $('#categories').append($data);
            $('.addCategories').attr('data-id', $ids);
        });
    </script>
@endsection


