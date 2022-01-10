<?php

namespace App\Http\Controllers;

use Json;
use Http;
use Illuminate\Http\Request;

class ItunesController extends Controller
{
    public function index()
    {
        $response = Http::get("https://rss.applemarketingtools.com/api/v2/be/music/most-played/12/songs.json")->json();
        $info = $response['feed'];
        $info = collect($info);
//            ->transform(function ($item,$key){
//               unset($item['id'],$item['author'],$item['links'],$item['copyright'],$item['icon']);
//               return $item;
//            });
        $albums = $response['feed']['results'];
        $albums = collect($albums)
            ->transform(function ($item, $key) {
                $item['artworkUrl100'] = str_replace('100x100', '500x500', $item['artworkUrl100']);
                unset($item['id'], $item['releaseDate'], $item['kind'], $item['artistId'], $item['url'],$item['contentAdvisoryRating']);
                return $item;
            });
        $result = compact('albums', 'info');
        Json::dump($result);
        return view('itunes.index',$result);
    }

}
