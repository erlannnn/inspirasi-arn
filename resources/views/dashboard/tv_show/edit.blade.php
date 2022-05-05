@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Create Tv Show</h6>
                    <a href="/dashboard/tvshow/" class="btn btn-sm btn-danger">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ "/dashboard/tv_show/".$tv_show->slug }}" method="post" enctype="multipart/form-data" class="needs-validation">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col">

                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title" value="{{ $tv_show->title }}" name="title" >
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}    
                                </div>
                                @enderror
                                <label for="slug" class="mt-2">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="slug" value="{{ $tv_show->slug }}" name="slug" required>
                                @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}    
                                </div>
                                @enderror
                                <div class="col-xs-12 form-group mt-2">
                                    {!! Form::label('selectall-category', 'Categories', ['class' => 'control-label']) !!}
                                    {!! Form::select('category[]', $categories, old('category'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-category' ]) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('category'))
                                        <p class="help-block">
                                            {{ $errors->first('category') }}
                                        </p>
                                    @endif
                                    {!! Form::label('selectall-genre', 'Genres', ['class' => 'control-label']) !!}
                                    {!! Form::select('genre[]', $genres, old('genre'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-genre' ]) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('genre'))
                                        <p class="help-block">
                                            {{ $errors->first('genre') }}
                                        </p>
                                    @endif
                                </div>
                                <label class="">Poster</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('poster') is-invalid @enderror" id="poster" value="{{ $tv_show->poster }}" name="poster">
                                    <label class="custom-file-label" for="poster">Choose file</label>
                                    @error('poster')
                                    <div class="invalid-feedback">
                                        {{ $message }}      
                                    </div>
                                    @enderror
                                </div>
                                <label class="mt-2">Foto Sampul</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('sampul') is-invalid @enderror" id="sampul" value="{{ $tv_show->sampul }}" name="sampul">
                                    <label class="custom-file-label" for="sampul">Choose file</label>
                                    @error('sampul')
                                    <div class="invalid-feedback">
                                        {{ $message }}      
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-2">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="hidden" name="description" id="description" value="{{ $tv_show->description }}">
                                    <trix-editor input="description"></trix-editor>  
                                    @error('description')
                                        <small class="text-danger">{{ $message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/dashboard/tv_show/" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>
            </div>
            
    </div>

    <script>
        const title = document.querySelector('#title')
        const slug = document.querySelector('#slug')
        
        console.log(title.value)
        title.addEventListener('change',function(){
            fetch('/dashboard/tv_show/createSlug/?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        


    </script>
@endsection