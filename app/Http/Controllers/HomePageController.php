<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class HomePageController extends Controller
{
     public function home_page (Request $request) {

        // $News_without_image = Article::with(
        //     ['user']
        // )->where('article_type', '=', 1)->get();
        
        $Article = Article::where('status', 1)->get()->take(3);

        // dd($Article);
        return view('welcome', [
            'Article' => $Article
        ]);
     }
}
