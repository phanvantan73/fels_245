<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 25/09/2018
 * Time: 13:53
 */

namespace App\Traits;

use File;

trait ProcessImage
{
    public function storeImage($file, $path, $attribute)
    {
        $pathFile = $path . $file->getClientOriginalName();
        if (File::exists($pathFile)) {
            File::delete($pathFile);
        }

        $newFileName = now() . '_' . $attribute . '.' . $file->getClientOriginalExtension();
        $file->move($path, $newFileName);

        return $newFileName;
    }
}
