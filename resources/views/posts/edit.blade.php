@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mx-auto">
            <div class="bg-blue-800 text-light px-3 pb-2" style="border-radius: 15px;">
                <div class="text-center py-3">
                    <h1 class="text-3xl font-weight-bold text-uppercase">Edit Post</h1>
                </div>
                <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                        <label class="font-weight-bold" for="productName">{{ __('Product Name') }}</label>

                        <div class="mb-2">
                            <input id="productName" type="text" class="form-control @error('productName') is-invalid @enderror" name="productName" value="{{ old('productName') ?? $post->productName}}" autocomplete="productName" autofocus>

                            @error('productName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                        <label class="font-weight-bold" for="productDescription">{{ __('Product Description') }}</label>

                        <div class="mb-2">
                        <textarea name="productDescription" id="productDescription" rows="10" class="ckeditor w-100 resize-none rounded-lg text-dark">{{$post->productDescription}}</textarea>
                            
                            @error('productDescription')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                        <label class="font-weight-bold" for="productParam">{{ __('Product Parameter') }}</label>

                        <div class="mb-2">
                            <textarea name="productParam" id="productParam" rows="10" class="ckeditor w-100 resize-none rounded-lg text-dark">{{$post->productParam}}}</textarea>
                            
                            @error('productParam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                        <label class="font-weight-bold" for="productPrice">{{ __('Product Price') }}</label>

                        <div class="mb-2">
                            <input id="productPrice" type="text" class="form-control @error('productPrice') is-invalid @enderror" name="productPrice" value="{{ old('productPrice') ?? $post->productPrice}}" autocomplete="productPrice" autofocus>

                            @error('productPrice')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                        <div class="mb-2">
                            <label class="font-weight-bold" for="productImage">{{ __('Product Image') }}</label>
                            <div class="custom-control custom-file">
                                <label id="img_path" class="custom-file-label" for="productImage"></label>
                                <input multiple id="productImage" type="file" class="custom-control-input @error('productImage') is-invalid @enderror" name="productImage" value="{{ old('productImage')}}" autocomplete="productImage" autofocus>
                            </div>
                            <div>
                                <img id="img" src="/storage/{{$post->productImage}}" alt="" class="w-25 mx-auto">
                            </div>
                            @error('productImage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mx-auto d-flex justify-content-center" style="width: fit-content; column-gap: 20px;">
                        <button type="submit" class="btn btn-success px-4 hover:shadow-outline">Apply</button>
                        <button type="button" onclick="window.history.back();" class="btn btn-danger px-4 hover:shadow-outline">Cancel</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var editor = CKEDITOR.replaceAll('ckeditor');//ckeditor is class name
            CKFinder.setupCKEditor(editor);

            $('#productImage').change(function(e){
                var img_path = URL.createObjectURL(e.target.files[0]);
                $('#img_path').text(e.target.files[0].name);
                $('#img').attr('src', img_path);
                $('#img').attr('alt', img_path);
            });
        });
    </script>
    
@endsection

