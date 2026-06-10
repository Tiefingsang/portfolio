<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'page', 'title', 'description', 'keywords', 'og_image'
    ];

    public static function getForPage($page)
    {
        return self::where('page', $page)->first();
    }
}
