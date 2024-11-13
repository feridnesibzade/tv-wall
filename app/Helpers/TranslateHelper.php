<?php
namespace App\Helpers;

use App\Models\Translate;
use Illuminate\Support\Facades\Cache;

class TranslateHelper
{

    public static function staticText($key)
    {
        // dd(Translate::pluck('text', 'key'));
        return Cache::remember('translates', now()->addMonths(1), function () {
            return Translate::pluck('text', 'key')->toArray();
        })[$key] ?? $key;
    }

}
