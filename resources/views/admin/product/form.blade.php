@extends('layouts.backend')

@section('content')

<div class="row">

    <div class="col-xl-4 col-lg-12 mb-12">
        @include('layouts._messages')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create New Category</h5>

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
                        <input type="text" class="form-control" id="SKU" name="SKU">
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
                        <label for="discription">Discription</label>
                        <input type="text" class="form-control" id="discription" name="discription">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control select2-single" name="status">
                            <option label="&nbsp;">&nbsp;</option>
                            <option value="active">Active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-0" id="save">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection


