@extends('layouts.backend')

@section('content')

<div class="row">
    <div class="col-xl-4 col-lg-12 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">New Category</h5>
                <form >
                    <div class="form-group">
                        <label for="name">Name Category</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <span>Parent Category</span>
                        {{-- {!! General::selectMultiLevel('parent', $getCategories, ['class' => 'form-control select2-single parent', 'selected' => old('parent_id') ?? $category['parent_id'] ?? '', 'placeholder'=>'---Chose Category---' ]) !!} --}}

                        <select class="form-control" id="parent" name="parent">
                            <option label="&nbsp;">&nbsp;</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-0" id="save">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-12 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Categori</h5>
                <table class="responsive nowrap" id="datatables" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Parent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td>
                                    <p class="list-item-heading">{{$item->name}}</p>
                                </td>
                                <td>
                                    <p class="text-muted">{{$item->slug}}</p>
                                </td>
                                <td>
                                    <p class="text-muted">{{$item->parent_id}}</p>
                                </td>
                                <td>
                                    <p class="text-muted">Cupcakes</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $('#save').on('click', function(){
            var $name = $('#name').val();
            var $parent = $('#parent').val();
            if ($name != "" && $parent != "") {
                $.ajax({
                    url : "{{route('categories.store')}}",
                    type: "POST",
                    data : {
                        _token: '{{ csrf_token() }}',
                        name : $name,
                        parent_id : $parent
                    },
                    cache:false,
                    success: function(dataResult){
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){
                            window.location = "{{route('categories.index')}}";
                        }
                        else if(dataResult.statusCode==201){
                            alert("Error occured !");
                        }
                    }
                })
            } else {
                alert('Please fill all the field !');
            }
        })
    })
</script>

@endsection
