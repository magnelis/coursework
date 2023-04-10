<?php

namespace App\Http;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public static function upload($file, $dir = '/', $default = '')
    {
        if ($file != null) {
            $path = $file->store($dir, 'public');
        } else {
            $path = $default;
        }
        return url("/storage/" . $path);
    }

    public static function delete($url, $dir = "")
    {
        $path = '/public/' . $dir . pathinfo($url, PATHINFO_BASENAME);
        if (Storage::exists($path)) {
            return Storage::delete($path);
        }
        return False;
    }

    public static function update($url, $newFile, $dir)
    {
        self::delete($url);
        return self::upload($newFile, $dir);
    }
}
