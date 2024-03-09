@extends('layouts.master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Albums</h2>
                </div>
            </div>
            <div class="content-body">
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-4 col-xl-3">
                            <a class="card border-0 text-white" href="#">
                                <img class="card-img" src="../../../app-assets/images/slider/10.jpg" alt="Card image">
                                <div class="card-img-overlay bg-overlay text-center">
                                    <h2 class="card-header  text-white">Card title</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection