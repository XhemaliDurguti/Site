<?php 
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


trait FileUploadTrait
{
    public function handleFileUpload(Request $request,string $fieldName,? string $oldPath = null, string $dir = 'uploads',) :?String
    {

        if (!$request->hasFile($fieldName)) {
            return null;
        }
        
        if($oldPath && File::exists(public_path($oldPath))) {
            File::delete(public_path($oldPath));
        }

        $file = $request->file($fieldName);
        $extension = $file->getClientOriginalExtension();
        $updateFileName = Str::random(30).'.'.$extension;

        $file->move(public_path($dir), $updateFileName);

        $filePath = $dir.'/'. $updateFileName;

        return $filePath;
    }
    /*
        Handle File Delete
    */
    public function deleteFile(string $path):void 
    {
        if($path && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}