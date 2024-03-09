@extends('layouts.master')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="col-12">
                <h2 >Albums</h2>
                </div>
            </div>
            <div class="content-body">
                <div class="content-body">
                    <div class="row">
                        @if (count($albums)>0)
                        @foreach ($albums as $album)
                        <div class="col-md-6 col-xl-4">
                            <div class="card border-0 text-white">
                                <img class="card-img" src="{{$album->getMedia($album->slug)->first()->getUrl()}}" alt="Card image">
                                <div class="card-img-overlay bg-overlay">
                                    <div class="px-1 badge bg-primary"><a  data-bs-toggle="modal" data-bs-target="#editModal{{$album->id}}"><i class="fa-solid fa-gears"></i></a></div>
                                    <h1 class=" mt-5 "><a class="card-text text-white fw-bolder" href="{{route('albums.show',($album->slug))}}">{{$album->title}}</a></h1>
                                    <p class=" mt-1 text-muted">Count Of Images <span class="badge badge-lg bg-primary">{{count($album->getMedia($album->slug))}}</span></p>
                                    <p class=" mt-1">Last Update {{$album->updated_at->format('d-m-y')}}</p>
                                </div>
                            </div>
                        </div>
                        @include('pages.albums.edit')
                        @endforeach
                        @else
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="text-primary">You don't have albums</h2>
                                <p class="card-txt mb-2">Let's make lots of memories </p>
                                <a class="btn btn-primary" href="{{route('albums.create')}}"> Create Albums</a>
                            </div>
                        </div>
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
