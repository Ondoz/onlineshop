@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-12">
<div class="row">
    <div class="col-12">

        <div class="mb-2">
            <h1>Chocolate Cake</h1>
            <div class="float-sm-right">
                <button type="button" class="btn btn-lg btn-outline-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ACTIONS
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                </div>
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


        <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab"
                    aria-controls="first" aria-selected="true">DETAILS</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " id="second-tab" data-toggle="tab" href="#second" role="tab"
                    aria-controls="second" aria-selected="false">ORDERS</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                <div class="row">
                    <div class="col-lg-4 col-12 mb-4">
                        <div class="card mb-4">
                            <div class="position-absolute card-top-buttons">
                                <button class="btn btn-outline-white icon-button ">
                                    <i class="simple-icon-pencil"></i>
                                </button>
                            </div>
                            <img src="{{asset('/')}}img/detail.jpg" alt="Detail Picture" class="card-img-top" />

                            <div class="card-body">
                                <p class="text-muted text-small mb-2">Description</p>
                                <p class="mb-3">
                                    {{$product->description}}
                                <p class="text-muted text-small mb-2">Rating</p>
                                <div class="form-group mb-3">
                                    <select class="rating" data-current-rating="5" data-readonly="true">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <p class="text-muted text-small mb-2">Price</p>
                                <p class="mb-3">Rp. {{$product->price}}</p>

                                <p class="text-muted text-small mb-2">Categories</p>
                                <p class="mb-3">
                                    @foreach ($product->categories as $item)    
                                        <a href="#">
                                            <span class="badge badge-pill badge-outline-theme-2 mb-1">{{$item->name}}</span>
                                        </a>
                                    @endforeach
                                </p>
                                <p class="text-muted text-small mb-2">Status</p>
                                <p class="mb-3">{{$product->status}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6 mb-4">
                                <div class="card dashboard-small-chart">
                                    <div class="card-body">
                                        <p class="lead color-theme-1 mb-1 value"></p>
                                        <p class="mb-0 label text-small"></p>
                                        <div class="chart">
                                            <canvas id="smallChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="card dashboard-small-chart">
                                    <div class="card-body">
                                        <p class="lead color-theme-1 mb-1 value"></p>
                                        <p class="mb-0 label text-small"></p>
                                        <div class="chart">
                                            <canvas id="smallChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Comments {{$product->reviews->count()}}</h5>
                                <div>
                                    @foreach ($comment as $item)
                                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                            <a href="#">
                                                <img alt="Profile Picture" src="{{asset('/')}}img/profile-pic-l.jpg" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                            </a>
                                            <div class="pl-3 pr-2">
                                                <a href="#">
                                                    <p class="font-weight-medium mb-0">{{$item->review}}
                                                    </p>
                                                    <p class="text-muted mb-1 text-small">{{$item->customer}} |
                                                       {{General::timeCreate($item->created_at)}} </p>
                                                </a>
                                                <div class="form-group mb-0">
                                                    <select class="rating" data-current-rating="{{$item->star}}"
                                                        data-readonly="true">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        {{$comment->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                <div class="row">
                    <div class="col-12 list">
                        <div class="card d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#">
                                        Marty Otte
                                    </a>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">Kansas City, USA</p>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">02.04.2018</p>
                                    <div class="w-15 w-xs-100 text-right">
                                        <span class="badge badge-pill badge-secondary">ON HOLD</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#">
                                        Linn Ronning
                                    </a>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">Toronto, Canada</p>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">01.04.2018</p>
                                    <div class="w-15 w-xs-100 text-right">
                                        <span class="badge badge-pill badge-primary">PROCESSED</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#">
                                        Rasheeda Vaquera
                                    </a>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">Kühndorf, Germany</p>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">25.03.2018</p>
                                    <div class="w-15 w-xs-100 text-right">
                                        <span class="badge badge-pill badge-primary">PROCESSED</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#">
                                        Esperanza Lodge
                                    </a>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">Montluçon, France</p>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">20.03.2018</p>
                                    <div class="w-15 w-xs-100 text-right">
                                        <span class="badge badge-pill badge-primary">PROCESSED</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#">
                                        Velva Valdovinos
                                    </a>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">Birmingham, UK</p>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">15.03.2018</p>
                                    <div class="w-15 w-xs-100 text-right">
                                        <span class="badge badge-pill badge-secondary">ON HOLD</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#">
                                        Merle Friberg
                                    </a>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">London, UK</p>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">11.03.2018</p>
                                    <div class="w-15 w-xs-100 text-right">
                                        <span class="badge badge-pill badge-primary">PROCESSED</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#">
                                        Brynn Bragg
                                    </a>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">Riga, Latviya</p>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">10.03.2018</p>
                                    <div class="w-15 w-xs-100 text-right">
                                        <span class="badge badge-pill badge-secondary">ON HOLD</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#">
                                        Ken Ballweg
                                    </a>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">Birmingham, UK</p>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">27.02.2018</p>
                                    <div class="w-15 w-xs-100 text-right">
                                        <span class="badge badge-pill badge-secondary">ON HOLD</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#">
                                        Latarsha Gama
                                    </a>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">Amsterdam,
                                        Netherlands</p>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">22.02.2018</p>
                                    <div class="w-15 w-xs-100 text-right">
                                        <span class="badge badge-pill badge-primary">PROCESSED</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#">
                                        Philip Nelms
                                    </a>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">Budapest, Hungary</p>
                                    <p class="mb-1 text-muted text-small w-15 w-xs-100">18.02.2018</p>
                                    <div class="w-15 w-xs-100 text-right">
                                        <span class="badge badge-pill badge-primary">PROCESSED</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <nav class="mt-4 mb-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item ">
                                    <a class="page-link first" href="#">
                                        <i class="simple-icon-control-start"></i>
                                    </a>
                                </li>
                                <li class="page-item ">
                                    <a class="page-link prev" href="#">
                                        <i class="simple-icon-arrow-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item ">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item ">
                                    <a class="page-link next" href="#" aria-label="Next">
                                        <i class="simple-icon-arrow-right"></i>
                                    </a>
                                </li>
                                <li class="page-item ">
                                    <a class="page-link last" href="#">
                                        <i class="simple-icon-control-end"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection