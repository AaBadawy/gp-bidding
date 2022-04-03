<?php
//todo create helper direction
use Illuminate\Support\Facades\File;

if(! function_exists('fetchMLData'))
{
    /**
     * @param $userId
     */
    function fetchMLData($userId)
    {
        return \Illuminate\Support\Facades\Http::get(config('antique.ml_url'). 'antique/api/user', ['id' => $userId])->collect();
    }
}

if(! function_exists('geMLDataFromServer'))
{
    /**
     * @return \Illuminate\Support\Collection
     */
    function getMLDataFromServer():\Illuminate\Support\Collection
    {
        $data = File::get(base_path('ml_data.json'));
        return collect(json_decode($data));
    }
}

if(! function_exists('getInterestTitlesByMLUserId'))
{
    /**
     * @param string|null $user_id
     * @return mixed
     */
    function getInterestTitlesByMLUserId(?string $user_id)
    {
        if($user_id === null)
            if(getMLDataFromServer()->count())
                return getMLDataFromServer()->random();
            else
                return getMLDataFromServer()->first();
       return getMLDataFromServer()->first(function ($value,$key) use($user_id)
       {
           return $key == $user_id;
       });
    }
}

if(! function_exists('asset_metronic')){
    /**
     * @param $path
     * @param $secure
     * @return string
     */
    function asset_metronic($path, $secure = null):string
    {
        return asset("{$path}");
    }
}


if(! function_exists('asset_website')){
    /**
     * @param $path
     * @param $secure
     * @return string
     */
    function asset_website($path, $secure = null):string
    {
        return asset("website_assets/{$path}");
    }
}

if(! function_exists("watching")){
    function watching(?\App\Helpers\WatchStrategy $strategy = null){
        return (new \App\Helpers\Watch($strategy))
            ->strategy();
    }
}


