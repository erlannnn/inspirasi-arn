<?php

namespace App\Http\Controllers;

use App\Models\CategoryTvshow;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryTvshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.category.index',[
            'categories' => CategoryTvshow::all(),
            'title' => 'Category'
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
        return view('dashboard.category.create',[
            'title' => 'Category'
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryTvshowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate(['name' => 'required','slug'=>'required']);

        CategoryTvshow::create($validatedData);

        alert::success('Sucsess','Data berhasil dibuat');
        return redirect('dashboard/category_tvshow');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryTvshow  $categoryTvshow
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryTvshow $categoryTvshow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryTvshow  $categoryTvshow
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryTvshow $categoryTvshow)
    {
        //
        return view('dashboard.category.edit',[
            'title' => 'Category',
            'category' => $categoryTvshow
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryTvshowRequest  $request
     * @param  \App\Models\CategoryTvshow  $categoryTvshow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryTvshow $categoryTvshow)
    {
        //
        $rules = ['name' => 'required','slug'=>'required'];
        if ($categoryTvshow->slug != $request->slug){
            $rules['slug'] = 'required|unique:tv_shows';
        }
        $validatedData = $request->validate($rules);

        $categoryTvshow->update($validatedData);

        alert::success('Sucsess','Data berhasil diubah');
        return redirect('dashboard/category_tvshow');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryTvshow  $categoryTvshow
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryTvshow $categoryTvshow)
    {
        //
        $categoryTvshow->delete();
        Alert::success('Success','Data Berhasil Dihapus!');
        return redirect('/dashboard/category_tvshow');
    }
    public function createSlug(Request $request)
    {

        $slug = SlugService::createSlug(CategoryTvshow::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);    
    }
}
