<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
// use App\Models\Rating;
use App\Models\TvShow;
use Illuminate\Support\Str;
// use AppRating;
use willvincent\Rateable\Rateable;
use Illuminate\Support\Facades\Auth;
use willvincent\Rateable\Rating;
use RealRashid\SweetAlert\Facades\Alert;
class TvShowController extends Controller
{
    use Rateable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.tv_show.index',[
            'title' => 'Tv Show',
            'tv_shows' => TvShow::all()
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
        $categories = \App\Models\CategoryTvshow::get()->pluck('name','id');
        $genres = \App\Models\Genre::get()->pluck('name','id');
        return view('dashboard.tv_show.create',[
            'title' => 'Tv Show',
            'categories' => $categories,
            'genres' => $genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTvShowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate(TvShow::rules(request_slug:$request->slug));
        // ddd($validatedData);
        // ddd($request->file('sampul'));   
        
        if ($request->file('poster')){
            $validatedData['poster'] = $request->file('poster')->store('sampul');
        }else{
            $validatedData['poster'] = 'poster.jpg';
        }
        if ($request->file('sampul')){
            $validatedData['sampul'] = $request->file('sampul')->store('sampul');
        }else{
            $validatedData['sampul'] = 'sampul.jpg';
        }
        // $validatedData['slug'] = $request->slug;
        $validatedData['description'] = htmlspecialchars_decode($validatedData['description']);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->description), 100, '...');
        $validatedData['author_id'] = auth()->user()->id;
        // ddd($validatedData);
        $tvshow = TvShow::create($validatedData);
        $tvshow->categories()->sync((array)$request->input('category'));
        $tvshow->genres()->sync((array)$request->input('genre'));
        Alert::success('Success','Data Berhasil Ditambahkan!');
        return redirect('/dashboard/tv_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TvShow  $tvShow
     * @return \Illuminate\Http\Response
     */
    public function show(TvShow $tvShow)
    {
        //
        return view('overview.detail-movie',[
            'show_detail_movie' => True,
            'tv_show' => $tvShow
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TvShow  $tvShow
     * @return \Illuminate\Http\Response
     */
    public function edit(TvShow $tvShow)
    {
        //
        $categories = \App\Models\CategoryTvshow::get()->pluck('name','id');
        $genres = \App\Models\Genre::get()->pluck('name','id');
        return view('dashboard.tv_show.edit',[
            'tv_show' => $tvShow,
            'title' => 'Tv Show',
            'categories' => $categories,
            'genres' => $genres
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTvShowRequest  $request
     * @param  \App\Models\TvShow  $tvShow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TvShow $tvShow)
    {
        //
        $validatedData = $request->validate(TvShow::rules(request_slug:$request->slug,tvshow_slug:$tvShow->slug));

        $validatedData['url_trailer'] = $request->url_trailer;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->description), 100, '...');
        $validatedData['description'] = htmlspecialchars_decode($validatedData['description']);
        if ($request->file('sampul')){
            $validatedData['sampul'] = $request->file('sampul')->store('sampul');
        }
        // ddd($validatedData['description']);
        $tvShow->update($validatedData);

        $tvShow->categories()->sync((array)$request->input('category'));

        // return redirect('/dashboard/tv_show')->with('success','Data telah diubah!');
        Alert::success('Success','Data Berhasil Diubah!');
        return redirect('/dashboard/tv_show');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TvShow  $tvShow
     * @return \Illuminate\Http\Response
     */
    public function destroy(TvShow $tvShow)
    {
        //
        // Alert::question('Warning','are you sure you want to delete?');
        $tvShow->categories()->delete();
        $tvShow->genres()->delete();
        $tvShow->delete();
        Alert::success('Success','Data Berhasil Dihapus!');
        return redirect('/dashboard/tv_show');
    }

    public function createSlug(Request $request)
    {

        $slug = SlugService::createSlug(TvShow::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);    
    }
    public function postRating (Request $request, TvShow $tvshow) {
        // dd($tvshow);
        $rating = new Rating;
        $rating->user_id = Auth::id();
        $rating->rating = 0;
        $rating->comment = $request->input('comment');
        $rating->rateable_id = $tvshow->id;
        $tvshow->ratings()->save($rating);
        // $tvshow->rateOnce($request->input('rating'),$request->input('comment')) ;
        Alert::success('Success','Thanks for your feedback');
        return redirect()->back();
    }
}
