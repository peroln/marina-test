<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Company extends Model
{
    protected $fillable = ['name','website','email'];

    static function saveLogo(){
        $image = request()->file('logo');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $path = storage_path('app/public/logo/' . $filename);
        Image::make($image->getRealPath())->resize(100, 100)->save($path);
        return $filename;
    }

    public function getLogoAttribute($value)
    {
        $v = Validator::make(['code' => $value], [
            'code' => 'url',
        ]);
        if ($v->fails()){
            return asset('storage/logo/'. $value);
        }
        return $value;
    }
}
