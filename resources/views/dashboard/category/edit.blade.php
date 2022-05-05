@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
                    <a href="/dashboard/category_tvshow/" class="btn btn-sm btn-danger">Back</a>
                </div>
                <div class="card-body">
                    <form action="/dashboard/category_tvshow/{{ $category->slug }}" method="post" enctype="multipart/form-data" class="needs-validation">
                        @csrf
                        @method("PUT")

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="title">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $category->name }}" name="name" required>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}    
                                </div>
                                @enderror
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ $category->slug }}" name="slug" required>
                                @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}    
                                </div>
                                @enderror   
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
        const name = document.querySelector('#name')
        const slug = document.querySelector('#slug')
        
        console.log(name.value)
        name.addEventListener('change',function(){
            fetch('/dashboard/category_tvshow/createSlug/?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        


    </script>
@endsection