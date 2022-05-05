<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.genre.index',[
            'genres' => Genre::all(),
            'title' => 'Tags'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.genre.create',[
            'title' => 'Tags'
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate(['name' => 'required','slug'=>'required']);

        Genre::create($validatedData);

        alert::success('Sucsess','Data berhasil dibuat');
        return redirect('dashboard/genre');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        //
        return view('dashboard.genre.edit',[
            'title' => 'genre',
            'genre' => $genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGenreRequest  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        //
        $rules = ['name' => 'required','slug'=>'required'];
        if ($genre->slug != $request->slug){
            $rules['slug'] = 'required|unique:tv_shows';
        }
        $validatedData = $request->validate($rules);

        $genre->update($validatedData);

        alert::success('Sucsess','Data berhasil diubah');
        return redirect('dashboard/genre');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        //
        $genre->delete();
        Alert::success('Success','Data Berhasil Dihapus!');
        return redirect('/dashboard/genre');
    }
    public function createSlug(Request $request)
    {

        $slug = SlugService::createSlug(Genre::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);    
    }
}
