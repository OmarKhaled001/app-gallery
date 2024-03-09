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
                        <div class="card col-md-3">
                            <img src="{{$image->getUrl()}}">
                            <div class="card-footer d-flex justify-content-center">
                                <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#moveModal{{$image->id}}"><i class="fa-solid fa-pen-to-square text-success"></i></a></div>
                                <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{$image->id}}"><i class="fa-solid fa-trash text-danger "></i></a></div>
                        </div>

                        </div>
                        <div class="modal fade" id="deleteModal{{$image->id}}" tabindex="-1" aria-labelledby="deleteModal{{$image->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModal{{$image->id}}Label">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('albums.image.destory' ,'test')}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <h5>{{trans('public.msg_delete')}} {{$image->name}}!</h5>
                                        <input type="hidden" id="id" name="id" value="{{$image->id}}">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        
                        <div class="modal fade" id="moveModal{{$image->id}}" tabindex="-1" aria-labelledby="moveModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="moveModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('albums.image.move' ,'test')}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <h5>{{trans('public.msg_delete')}} {{$image->title}}!</h5>
                                        <input type="hidden" id="id" name="id" value="{{$image->id}}">
                                        <div class="form-group mt-1">
                                            <label for="album_id">{{ trans('sections.grades') }}:</label>
                                            <select name="album_id" class="select2 form-select mt-1" id="grade_id">
                                                @foreach ($albums as $album)
                                                <option value="{{$album->id}}">{{$album->title}}</option>
                                                @endforeach
                                            </select>
                                            @error('album_id') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


