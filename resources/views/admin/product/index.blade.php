@extends('layouts.backend')
@section('header')
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-2">
            <h1>Layout List</h1>
            <div class="float-sm-right text-zero">
                <a type="button" class="btn btn-primary" href="{{route('product.create')}}">ADD NEW</a>
            </div>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Library</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
        </div>

        <div class="mb-2">
            <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
                role="button" aria-expanded="true" aria-controls="displayOptions">
                Display Options
                <i class="simple-icon-arrow-down align-middle"></i>
            </a>
            <div class="collapse d-md-block" id="displayOptions">
                <div class="d-block d-md-inline-block">
                    <div class="btn-group float-md-left mr-1 mb-1">
                        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Order By
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Nama</a>
                            <a class="dropdown-item" href="#">Ketagories</a>
                        </div>
                    </div>
                    <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                        <input placeholder="Search...">
                    </div>
                </div>
                <div class="float-md-right">
                    <span class="text-muted text-small">Displaying 1-10 of 210 items </span>
                    <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        20
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="">10</a>
                        <a class="dropdown-item active" href="#">20</a>
                        <a class="dropdown-item" href="#">30</a>
                        <a class="dropdown-item" href="#">50</a>
                        <a class="dropdown-item" href="#">100</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator mb-5"></div>
    </div>
</div>

<div class="row">
    <div class="col-12 list" data-check-all="checkAll">
        @foreach ($product as $item)
       
        <div class="card d-flex flex-row mb-3">
            <a class="d-flex" href="Layouts.Details.html">
                <img src="{{asset('/')}}img/goose-breast-thumb.jpg" alt="Goose Breast" class="list-thumbnail responsive border-0" />
            </a>
            <div class="d-flex flex-grow-1 min-width-zero">
                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="{{route('product.show', $item->slug)}}">
                        {{ucfirst($item->name)}}
                    </a>
                    <p class="mb-1 text-muted text-small w-15 w-xs-100">{{ucfirst($item->qty)}} Qty</p>
                    <p class="mb-1 text-muted text-small w-15 w-xs-100">
                        Rp. {{ucfirst($item->price)}}
                    </p>
                    <p class="mb-1 text-muted text-small w-15 w-xs-100" contenteditable="true">Rating </p>
                    <p class="mb-1 text-muted text-small w-15 w-xs-100">Dilihat 100</p>
                    <div class="w-15 w-xs-100">
                        <span class="badge badge-pill badge-secondary">{{ucfirst($item->status)}}</span>
                    </div>

                    <div class="btn-group dropright w-15 w-xs-100 ">
                        <button type="button" class="btn btn-xs btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu" x-placement="right-start" style="position: absolute; transform: translate3d(109px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="{{route('product.edit', $item->slug)}}"><strong>Edit</strong></a>
                            <a class="dropdown-item" href="#"> Delete</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $product->links() }}
    </div>
</div>
@endsection

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.price').editable();
        });
    </script>
@endsection


