@extends('layouts.backend')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row  ">
                <div class="col-12">

                    <h1>Dashboard</h1>
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
                    <div class="separator mb-5"></div>


                </div>
                <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table id="barang-get"  class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Total Price</th>
                              <th>Rating</th>
                              <th>Discount</th>
                              <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                           
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </div>
                  </div>

               
            </div>
        </div>
    </main>
@endsection


