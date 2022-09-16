<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Image extends Model
{
    use HasFactory;

    public static function storeImage($request, $id, $type)
    {
        $files = $request->images;
        foreach ($files as $val) {
            $file = $val->store('public/images');
            $file = Str::replace('public', '', $file);

            $image = new Image();
            $image->type = $type;
            $image->external_id = $id;
            $image->url = $file;
            $image->save();
        }

        return true;
    }
}
