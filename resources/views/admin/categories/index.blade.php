@extends('layouts.backend')

@section('content')

<div class="row">

    <div class="col-xl-4 col-lg-12 mb-12">
        @include('layouts._messages')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create New Category</h5>
                <form id="categories" method="POST" action="{{route('categories.store')}}">
                    @csrf

                   {{-- @method("put") --}}
                    <div class="form-group">
                        <label for="name">Name Category</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary mb-0" id="save">Submit</button>
                    <button type="reset" class="btn btn-primary mb-0" id="new" hidden>New</button>
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

                                <td style="">
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
                                        <button type="button" class="btn btn-secondary btn-xs mb-1 edit" id="edit" data-id="{{$item->id}}"><div class="glyph-icon simple-icon-pencil"></div></button>
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
    $(document).ready(function(){
        $('#datatables').on('click', '.edit', function(){

            $id = $(this).attr('data-id');
            $put = '<input id="put" name="_method" type="hidden" value="PUT">';
            $('#categories').attr('action', 'categories/' + $id );
            $('#categories').append($put);
            $('#save').html('Update');
            $('#new').prop('hidden', false);
            $.ajax({
                url : "{{route('json.category_edit')}}",
                type: "POST",
                data: {
                    token: '{{ csrf_token() }}',
                    id: $id
                },
                dataType: "JSON",
                success: function(e){
                    $('#name').val(e.name);
                    console.log(e);
                }
            })
        })
        $('#new').on('click', function(){
            $('#categories').attr('action', 'categories');
            $('#save').html('Submit');
            $('#new').prop('hidden', true);
            $('#put').remove();
        })
    })
</script>

@endsection
