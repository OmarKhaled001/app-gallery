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
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{route('albums.store')}}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                            <div class="col">
                                <label for="text" class="form-label">Title : </label>
                                <input type="text" name="title" class="form-control mb-1" placeholder="Album title">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col">
                                <label for="text" class="form-label">Images :</label>
                                <input type="file" name="images[]" data-allow-reorder="true"
                                data-max-file-size="3MB" class="form-control mb-1" multiple accept="image/*" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-1">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    // // Get a reference to the file input element
    // const inputElement = document.querySelector('input[type="file"]');

    // // Create a FilePond instance
    // const pond = FilePond.create(inputElement);
    // FilePond.registerPlugin(
    // FilePondPluginImagePreview,
    // FilePondPluginImageExifOrientation,
    // FilePondPluginFileValidateSize,
    // );

</script>
@endsection

