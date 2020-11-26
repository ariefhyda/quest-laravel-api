<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CobaController extends Controller
{
  public function index(Request $request)
  {
      // menampung keyword judul
      $judul = $request->judul;

      // mengatur cache
      $query = Cache::remember($judul, 60 * 24, function() use($judul){
        // crawling data
        $url = "http://api.tvmaze.com/search/shows?q=$judul";
        $response = Http::get($url);
        return $response->json();
      });
      echo var_dump($query);

  }
}
