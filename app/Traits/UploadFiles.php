<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFiles
{

    /**
     * @method uploadFile
     *
     * check if the initiative belongs to the logged in user's unit or committee
     *
     * @param $file   => is the file sent in the form
     * @param $type   => is the file type in the system
     * @param $name   => the name of the module
     * @param $folder => the folder that the files will store at
     *
     * @return @String
     */
    public function uploadFile($file, $name, $folder)
    {
        $fileName = $name .  "_" . uniqid() . '.' . $file->getClientOriginalExtension();

        if (!Storage::exists('/' . $folder)) {

            Storage::makeDirectory('/' . $folder, 0775, true);
        }
        $file->storeAs($folder,$fileName);

        return $fileName;
    }
}
