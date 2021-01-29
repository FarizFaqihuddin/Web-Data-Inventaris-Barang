<?php
namespace App\Helpers;

use App\Traits\ImagesTrait;
// use App\Traits\FilesTrait;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;

class General
{
    use ImagesTrait;
    // use FilesTrait;
    public static function setImage($img,$path){
        if ($img != null) {
            $prefix_path    = $path . '/' . date('YmdHis');
            $path           = (new self)->getHashName($img, $prefix_path);
            $image          = (new self)->image($img);
            $save           = (new self)->saveImage($path, $image);
            return $path;
        }
        return null;
    }

    public static function setFile($file,$path){
        if ($file != null) {
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/'.date('YmdHis').'/';
            $file->move($path, $filename);
            return '/uploads/'.date('YmdHis').'/'.$filename;
        }
        return null;
    }

    public static function columnDatatable($datas){
        foreach($datas as $data)
        {
            $columns[] = ['data'=>$data, 'name'=>$data ];
        }
        return json_encode($columns);
    }

    public static function getSegmentFromEnd($url,$position_from_end = 1) {
        $segments = $url;
        return $segments[sizeof($segments) - $position_from_end];
    }

    public static function getSetting($key,$value){
        $setting = Setting::where('key',$key)->first();
        if(!empty($setting))
            $value = $setting->value;
        return $value;
    }
}
