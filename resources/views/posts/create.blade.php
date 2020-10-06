@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mx-auto">
            <div class="bg-blue-800 text-light px-3 pb-2" style="border-radius: 15px;">
                <div class="text-center py-3">
                    <h1 class="text-3xl font-weight-bold text-uppercase">Create Post</h1>
                </div>
                <form action="/post" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                        <label class="font-weight-bold" for="title">{{ __('Title') }}</label>

                        <div class="mb-2">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')}}" autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                        <label class="font-weight-bold" for="description">{{ __('Description') }}</label>

                        <div class="mb-2">
                            <textarea name="description" id="description" rows="10" class="w-100 resize-none rounded-lg text-dark"></textarea>
                            
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                        <label class="font-weight-bold" for="url">{{ __('URL') }}</label>

                        <div class="mb-2">
                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url')}}" autocomplete="url" autofocus>

                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                        <div class="mb-2">
                            <label class="font-weight-bold" for="image">{{ __('Profile image') }}</label>
                            <div class="custom-control custom-file">
                                <label id="img_path" class="custom-file-label" for="image"></label>
                                <input multiple id="image" type="file" class="custom-control-input @error('image') is-invalid @enderror" name="image" value="{{ old('image')}}" autocomplete="image" autofocus>
                            </div>
                            <div>
                                <img id="img" src="" alt="" class="rounded-circle w-50 mx-auto">
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mx-auto d-flex justify-content-center" style="width: fit-content; column-gap: 20px;">
                        <button class="btn btn-success hover:shadow-outline">Apply</button>
                        <button class="btn btn-danger hover:shadow-outline">Cancel</button>
                    </div>  
                    <button class="bg-primary">Test Button</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var editor = CKEDITOR.replace('description');
            CKFinder.setupCKEditor(editor);

            $('#image').change(function(e){
                var img_path = URL.createObjectURL(e.target.files[0]);
                $('#img_path').text(e.target.files[0].name);
                $('#img').attr('src', img_path);
                $('#img').attr('alt', img_path);
            });
        });
    </script>
    
@endsection

