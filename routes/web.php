<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TvShowController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CategoryTvshowController;
use App\Models\TvShow;
// use App\Models\Rating;
use willvincent\Rateable\Rateable;
use Illuminate\Support\Facades\Auth;
use willvincent\Rateable\Rating;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $news = TvShow::limit(3)->orderBy('id','DESC')->get();
    return view('overview/index',[
        // 'populer_tv_shows' => 
        'title' => 'Home',
        'news' => $news
    ]);
})->name('home');

Route::get('/home', function () {
    $news = TvShow::limit(3)->orderBy('id','DESC')->get();
    return view('overview/index',[
        // 'populer_tv_shows' => 
        'title' => 'Home',
        'news' => $news
    ]);
});


Route::get('/about', function () {
    return view('overview/about',[
        // 'populer_tv_shows' => 
        'title' => 'About'
    ]);
})->name('about');

Route::get('/news', function () {
    $news = TvShow::orderBy('id','DESC')->get();

    return view('overview/news',[
        // 'populer_tv_shows' =>, 
        'title' => 'News',
        'news' => $news
    ]);
})->name('news');

Route::get('/contact', function () {
    return view('overview/contact',[
        // 'populer_tv_shows' => 
        'title' => 'Contact',
    ]);
})->name('contact');

Route::get('/news/{tvshow:slug}', function (TvShow $tvshow) {
    $comments = Rating::where('rateable_id','=',$tvshow->id)->get();
    $count_comments = $comments->count();
    $news = TvShow::limit(5)->orderBy('id','DESC')->get();
    // ddd($comment);
    $rec_tvshow = TvShow::where('id','!=',$tvshow->id)->get();
    return view('overview.detail_news',[
        'article' => $tvshow ,
        'title' => $tvshow->title,
        'comments' => $comments,
        'count_comments' => $count_comments,
        'rec_tvshow' => $rec_tvshow ,
        'news' => $news ,
        // 'show_detail_movie' => False
    ]);
});

// Route::get('/detail', function () {
//     return view('overview/detail-movie-two',[
//         'show_detail_movie' => False
//     ]);
// });
Route::get('/api', function () {
    return view('overview/api-movie');
});

Route::get('/login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);

Route::get('/register', [LoginController::class,'register']);
Route::post('/register', [LoginController::class,'AuthRegis']);

Route::get('/logout', [LoginController::class,'logout'])->name('logout');


Route::get('/dashboard', function(){
    return view('dashboard/index',['title'=>'Dashboard']);
});

Route::get('/dashboard/tv_show/createSlug',[TvShowController::class, 'createSlug']);
Route::resource('/dashboard/tv_show', TvShowController::class)->middleware('auth');;

Route::post('/comment/{tvshow}', [TvShowController::class,'postRating'])->name('postRating')->middleware('auth');

Route::get('/dashboard/category_tvshow/createSlug',[CategoryTvshowController::class, 'createSlug']);
Route::resource('/dashboard/category_tvshow', CategoryTvshowController::class)->middleware('auth');;


Route::get('/dashboard/genre/createSlug',[GenreController::class, 'createSlug']);
Route::resource('/dashboard/genre', GenreController::class)->middleware('auth');;
