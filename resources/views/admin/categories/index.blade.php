@extends('layouts.backend')

@section('content')

<div class="row">

    <div class="col-xl-4 col-lg-12 mb-12">
        @include('layouts._messages')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create New Category</h5>
                <form method="POST" url="{{route('categories.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name Category</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <span>Parent Category</span>
                        {!! General::selectMultiLevel('parent', $getCategories, ['class' => 'form-control', 'selected' => old('parent_id') ?? $category['parent_id'] ?? '', 'placeholder'=>'---Chose Category---' ]) !!}
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
                                    <p class="text-muted">{{$item->parent ? $item->parent->name : ''}}</p>
                                </td>
                                <td style="width: 10%">
                                    <p class="text-muted">
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['admin/categories', $item->id],
                                            'style' => 'display:inline'
                                            ]) !!}

                                        {!! Form::button(' <div class="glyph-icon simple-icon-trash "></div>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs mb-1',
                                            'title' => 'Hapus Barang',
                                            'onclick'=>'return confirm("Anda yakin ingin menghapus barang ini ?")'
                                            )) !!}
                                        {!! Form::close() !!}
                                        <button type="button" class="btn btn-secondary btn-xs mb-1"><div class="glyph-icon simple-icon-pencil"></div></button>
                                    </p>
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
    // $(document).ready(function(){
    //     $('#save').on('click', function(){
    //         var $name = $('#name').val();
    //         var $parent = $('.parent').val();
    //         if ($name != "" && $parent != "") {
    //             $.ajax({
    //                 url : "{{route('categories.store')}}",
    //                 type: "POST",
    //                 data : {
    //                     _token: '{{ csrf_token() }}',
    //                     name : $name,
    //                     parent_id : $parent
    //                 },
    //                 cache:false,
    //                 success: function(dataResult){
    //                     console.log(dataResult);
    //                     var dataResult = JSON.parse(dataResult);
    //                     if(dataResult.statusCode==200){
    //                         window.location = "{{route('categories.index')}}";
    //                     }
    //                     else if(dataResult.statusCode==201){
    //                         alert("Error occured !");
    //                     }
    //                 }
    //             })
    //         } else {
    //             alert('Please fill all the field !');
    //         }
    //     })
    // })
</script>

@endsection
