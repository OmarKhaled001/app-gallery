<div class="modal fade" id="editModa{{$album->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">

            {{-- Delete Model --}}
            <div class="modal-content" id="delete">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Delete {{$album->title}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('albums.destory' ,'test')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        <h4 class="text-danger">Are you sure for delete {{$album->title}}!</h4>
                        <p>You can move his images to another album befour delete click on move</p>
                        <input type="hidden" id="id" name="slug" value="{{$album->slug}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="move-btn">Move</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>

            {{-- Move Mode --}}
            <div class="modal-content d-none" id="move">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModaLabel">Move Images</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('albums.move' ,'test')}}" method="post">
                <div class="modal-body">
                            @csrf
                            @method('patch')
                        <div class="row">
                            <h5>You Will Move {{$album->title}}'s images befor delete</h5>
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$album->id}}">
                        </div>
                        <div class="form-group mt-1">
                            <label for="album_id">Move To:</label>
                            <select name="album_id" class="form-select mt-1" id="grade_id">
                                <option value="" selected >Chooes from list</option>
                                @foreach ($albums as $album)
                                <option value="{{$album->id}}">{{$album->title}}</option>
                                @endforeach
                            </select>
                            @error('album_id') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="back">back</button>
                        <button type="submit" class="btn btn-success">Move</button>
                    </div>
                </form>
            </div>
    </div>
</div>