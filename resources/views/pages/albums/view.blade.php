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
                        @if ($images = ($album->getMedia($album->slug)))
                        @foreach ($images as $image) 
                        <div class=" col-lg-3 col-sm-6">
                            <img class="card-img-top "  src="{{$image->getUrl()}}" alt="{{$image->name}}" >
                            <a href="" data-bs-toggle="modal" data-bs-target="#editModal{{$image->id}}"><i class="fa-solid fa-pen-to-square text-success"></i></a>
                        </div>
                        @include('pages.albums.edit-singel')
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#move-btn").click(function(){
                $('#move').removeClass('d-none');
                $('#delete').addClass('d-none');
            });
            $("#back").click(function(){
                $('#delete').removeClass('d-none');
                $('#move').addClass('d-none');
            });
        });
    </script>
@endsection


