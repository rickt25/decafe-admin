<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadHandler {
  public function uploadFile($file, $path ,$fileName){
    $extension = $file->extension();
    $profile = $file->storeAs(
      $path,
      $fileName . '.' . $extension,
      'public'
    );
    return $profile;
  }

  public function deleteFile($file){
    if($file){
      Storage::disk('public')->delete($file);
    }
  }
}
