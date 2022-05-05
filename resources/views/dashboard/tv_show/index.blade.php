@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Artikel</h6>
                    <a href="/dashboard/tv_show/create" class="btn btn-sm btn-primary">&plus; Create</a>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <p>{{ session('success') }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table">
                        <thead>
    
                            <tr>
                                <th>No</th>
                                <th>Sampul</th>
                                <th>Judul</th>
                                <th>Categories</th>
                                <th>Tags</th>
                                <th>Excerpt</th>
                                <th></th>
                                {{-- <th>Description</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tv_shows as $tv_show)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><image src="{{ asset('storage/'. $tv_show->sampul) }}" alt="Images" style="width:30%"/></td>
                                <td>{{ $tv_show->title }}</td>
                                {{-- <td>{{ $tv_show->sinopsis }}</td> --}}
                                <td>
                                    @foreach ($tv_show->categories as $category)
                                        <a href="{{ '/dashboard/category_tvshow/' . $category->slug}}"class="badge badge-info label-many">{{ $category->name }}</a>
                                    @endforeach                                    
                                </td>
                                <td>
                                    @foreach ($tv_show->genres as $genre)
                                        <a href="{{ '/dashboard/genre/' . $genre->slug}}"class="badge badge-info label-many">{{ $genre->name }}</a>
                                    @endforeach                                    
                                </td>
                                </td>

                                <td class="">
                                    {{ $tv_show->excerpt }}
                                </td>
                                <td>
                                    <a href="{{ '/dashboard/tv_show/'.$tv_show->slug }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ '/dashboard/tv_show/'.$tv_show->slug.'/edit/' }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <form action="/dashboard/tv_show/{{$tv_show->slug }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm show_confirm_delete" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
