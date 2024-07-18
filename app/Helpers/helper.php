<?php

use App\Models\Language;
use Illuminate\Support\Str;

/* Format news Tags */

function formatTags(array $tags): String
{
    return implode(',', $tags);
}

/* get selected language from session */

function getLanguage() : string
{
    if (session()->has('language')) {
        return session('language');
    } else {
        try {
            $language  = Language::where('default', 1)->first();
            setLanguage($language->lang);
            return $language->lang;
        } catch (Throwable $th) {
            setLanguage('en');
            return $language->lang;
        }
    }
}
/** set language code in session */
function setLanguage(string $code): void {
    session(['language' => $code]);
}
/* Truncate Text */
function truncate(string $text,int $limit = 45): String {
    return Str::limit($text,$limit,'...');
}

/* Convert a number in K fromat */

function convertToKFormat(int $number) : String {
    if($number < 1000) {
        return $number;
    }elseif($number <1000000){
        return round($number / 1000,1) .'K';
    }else 
    {
        return round($number /1000000,1).'M';
    }
} 