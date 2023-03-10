<?php

use App\Models\Article;
use App\Models\Cgy;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/relation', function () {
    // $article = Article::find(1);
    // dd($article->cgy->subject);

    // $cgy = Cgy::find(1);
    // dd($cgy->articles()->where('enabled',1)->get());

    $article = Article::find(1);
    dd($article->tags);

    // $tag = Tag::find(2);
    // dd($tag->articles);
});

Route::get('/changerelation', function () {
    // $article = Article::find(1);
    // $article->cgy_id = 5;
    // $cgy_4 = Cgy::find(4);
    // $article->cgy()->associate($cgy_4);
    // $article->save();
    // dd($article);
    // $cgy = Cgy::find(1);
    // $article = Article::where('cgy_id',5)->first();
    // $cgy->articles()->save($article);
    // dd(Article::find($article->id));

    $article = Article::find(1);
    //$article->tags()->attach([4,5]);
    $article->tags()->sync([6, 7, 8, 9, 10]);
    dd($article->tags);
});

Route::get('/distinct', function () {
    $data = Article::select(['id', 'subject', 'cgy_id'])->distinct('cgy_id')->get();
    return $data;
});

Route::get('/pluck', function () {
    //$data = Cgy::select(['id','subject'])->get();
    $data = Cgy::pluck('subject', 'id');
    return $data;
});
