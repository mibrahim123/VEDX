@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-tb-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="small-box bg-info" >
                            <div class="inner">
                                <p style="font-weight: 500; font-weight:600; font-size:20px !important">Session</p>
                                <h5>29</h5>
                            </div>
                            <div class="icon">
                                <i class="fa fa-calendar " aria-hidden="true"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More Info
                                <i class="fas fa-lg fa-arrow-circle-right"></i>
                            </a>
                            <div class="overlay d-none">
                                <i class="fas fa-2x fa-spin fa-sync-alt text-gray"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-tb-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="small-box bg-success" >
                            <div class="inner">
                                <p style="font-weight: 500; font-weight:600; font-size:20px !important">Learners</p>
                                <h5>35</h5>
                            </div>
                            <div class="icon">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>

                            </div>
                            <a href="#" class="small-box-footer">
                                More Info
                                <i class="fas fa-lg fa-arrow-circle-right"></i>
                            </a>
                            <div class="overlay d-none">
                                <i class="fas fa-2x fa-spin fa-sync-alt text-gray"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-tb-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="small-box bg-warning" icontheme="primary">
                            <div class="inner">
                                <p style="font-weight: 500; font-weight:600; font-size:20px !important">Experts</p>
                                <h5>50</h5>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More Info
                                <i class="fas fa-lg fa-arrow-circle-right"></i>
                            </a>
                            <div class="overlay d-none">
                                <i class="fas fa-2x fa-spin fa-sync-alt text-gray"></i>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
