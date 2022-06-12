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

if(! function_exists('build_laravel_component')) {
    /**
     * @param string $component
     * @param array $attributes
     * @return string
     */
    function build_laravel_component(string $component,array $attributes) {
        $glue = "<x-$component ";
        foreach ($attributes as $key => $value) {
            $glue .= ":$key=$value";
        }
        return $glue . " />";
    }
}

if(! function_exists('notification_url')) {
    function notification_url(\Illuminate\Notifications\DatabaseNotification $notification,string $base_route = 'dashboard.')
    {
        if(array_key_exists("url",$notification->data))
            return $notification->data['url'];

        if(array_key_exists('route',$notification->data))
            return route($notification->data['route']);

        $glow = \Illuminate\Support\Str::of($notification->data['model'])->plural()->lower();
        $params = [];
        if(array_key_exists('id',$notification->data)) {
            $params[(string) $glow->singular()] = $notification->data['id'];
            $glow .= '.show';
        } else {
            $glow .= '.index';
        }
        return route($base_route . $glow, $params);
    }
}

if(! function_exists("old_or"))
{
    function old_or(string $key,string|\Illuminate\Database\Eloquent\Model|null $value = null)
    {
        if($value instanceof \Illuminate\Database\Eloquent\Model)
            $value = $value?->$key;
        return old($key,$value);
    }
}


