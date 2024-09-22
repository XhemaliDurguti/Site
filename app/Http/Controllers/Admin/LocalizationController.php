<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class LocalizationController extends Controller
{
    function adminIndex(): View
    {
        $languages = Language::all();
        return view('admin.localization.admin-index', compact('languages'));
    }
    function frontendIndex(): View
    {
        $languages = Language::all();
        return view('admin.localization.frontend-index', compact('languages'));
    }
    function extractLocalization(Request $request)
    {
        $directory = $request->directory;
        $languageCode = $request->language_code;
        $folderName = $request->file_name;
        //__('strings')
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

        $localizationStrings = [];

        foreach ($files as $file) {
            if ($file->isDir()) {
                continue;
            }
            $contents = file_get_contents($file->getPathname());

            preg_match_all('/_\([\'"](.+?)[\'"]\)/', $contents, $matches);

            if (!empty($matches[1])) {
                foreach ($matches[1] as $match) {
                    $localizationStrings[$match] = $match;
                }
            }
        }
        $phpArray = "<?php\n\nreturn " . var_export($localizationStrings, true) . ";\n";
        //Create sub folder if not exists
        if (!File::isDirectory(lang_path($languageCode))) {
            File::makeDirectory(lang_path($languageCode), 0755, true);
        }
        file_put_contents(lang_path($languageCode . '/' . $folderName . '.php'), $phpArray);
        return redirect()->back();
    }
    function updateLangString(Request $request): RedirectResponse
    {
        // dd($request->value);
        $languageStrings = trans($request->file_name, [], $request->lang_code);

        $languageStrings[$request->key] = $request->value;
        // dd($languageStrings);
        $phpArray = "<?php\n\nreturn " . var_export($languageStrings, true) . ";\n";
        // dd($phpArray);
        file_put_contents(lang_path($request->lang_code . '/' . $request->file_name . '.php'), $phpArray);

        toast(__('Updated Successfully!'), 'success');

        return redirect()->back();
    }

    function translateString(Request $request)
    {
        $langCode = $request->language_code;
        
        $languageStrings = trans($request->file_name, [], $request->language_code);

        $keyStirngs = array_keys($languageStrings);

        $text = implode(' | ', $keyStirngs);

        $response = Http::withHeaders([
            'X-RapidAPI-Key' => '46daf4d460mshc9d613e80f95a72p1df14ejsna2bd6b1d790f',
            'X-RapidAPI-Host' => 'microsoft-translator-text.p.rapidapi.com'
        ])->post("https://microsoft-translator-text.p.rapidapi.com/translate?api-version=3.0&to%5B0%5D=$langCode&textType=plain&profanityAction=NoAction", [
            [
                "Text" => $text
            ]
        ]);
        // dd($response->body());

        $translatedText = json_decode($response->body())[0]->translations[0]->text;
        
        $translatedValues = explode(' | ', $translatedText);
        
        $updatedArray = array_combine($keyStirngs, $translatedValues);

        $phpArray = "<?php\n\nreturn " . var_export($updatedArray, true) . ";\n";
        // dd($phpArray);
        file_put_contents(lang_path($langCode . '/' . $request->file_name . '.php'), $phpArray);

        return response(['status'=>'success',__('Translation is completed')]);
        
    }
}
