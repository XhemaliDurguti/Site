<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLanguageStoreRequest;
use App\Http\Requests\AdminLanguageUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Http;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:language index,admin'])->only(['index']);
        $this->middleware(['permission:language create,admin'])->only(['create', 'store']);
        $this->middleware(['permission:language update,admin'])->only(['edit', 'update']);
        $this->middleware(['permission:language delete,admin'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.language.index', compact('languages'));
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $response = Http::withHeaders(
            [
                'x-rapidapi-host' => 'microsoft-translator-text.p.rapidapi.com',
                'x-rapidapi-key' => '46daf4d460mshc9d613e80f95a72p1df14ejsna2bd6b1d790f',
            ]
        )->get('https://microsoft-translator-text.p.rapidapi.com/languages?api-version=3.0');

        $data = $response->json();
        $lange = [];

        if (isset($data['translation'])) {
            foreach ($data['translation'] as $langCode => $details) {
                $lange[] = [
                    'name' => $details['name'],  // Emri i gjuhës
                    'code' => $langCode          // Shkurtesa e gjuhës (langCode)
                ];
            }
        }
        return view('admin.language.create',compact('lange'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminLanguageStoreRequest $request)
    {
        $language = new Language();
        $language->name = $request->name;
        $language->lang = $request->lang;
        $language->slug = $request->slug;
        $language->default = $request->default;
        $language->status = $request->status;
        $language->save();

        toast(__('Registered Successfully!'), 'success')->width('350');

        return redirect()->route('admin.language.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $language = Language::findOrFail($id);
        $response = Http::withHeaders(
            [
                'x-rapidapi-host' => 'microsoft-translator-text.p.rapidapi.com',
                'x-rapidapi-key' => '46daf4d460mshc9d613e80f95a72p1df14ejsna2bd6b1d790f',
            ]
        )->get('https://microsoft-translator-text.p.rapidapi.com/languages?api-version=3.0');

        $data = $response->json();
        $lange = [];

        if (isset($data['translation'])) {
            foreach ($data['translation'] as $langCode => $details) {
                $lange[] = [
                    'name' => $details['name'],  // Emri i gjuhës
                    'code' => $langCode          // Shkurtesa e gjuhës (langCode)
                ];
            }
        }
        return view('admin.language.edit', compact('language','lange'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminLanguageUpdateRequest $request, string $id)
    {
        $language = Language::findOrFail($id);
        $language->name = $request->name;
        $language->lang = $request->lang;
        $language->slug = $request->slug;
        $language->default = $request->default;
        $language->status = $request->status;
        $language->save();

        toast(__('Updated Successfully!'), 'success')->width('350');
        return redirect()->route('admin.language.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $language = Language::findOrFail($id);
            if ($language->lang == 'en') {
                return response(['status' => 'error', 'message' => __('Can\'t Delete this One!')]);
            }
            $language->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong')]);
        }
    }
}
