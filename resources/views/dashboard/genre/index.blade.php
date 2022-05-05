@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tags</h6>
                    <a href="/dashboard/genre/create" class="btn btn-sm btn-primary">&plus; Create</a>
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
                                <th>Nama</th>
                                <th></th>
                                {{-- <th>Description</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genres as $genre)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $genre->name }}</td>
                                <td>
                                    <a href="{{ '/dashboard/genre/'.$genre->slug }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ '/dashboard/genre/'.$genre->slug.'/edit/' }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <form action="/dashboard/genre/{{$genre->slug }}" method="post" class="d-inline">
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