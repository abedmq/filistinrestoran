<?php


namespace App\Traits;

trait ImageTrait
{
    function getImage($size = 'thump', $attribute = 'image')
    {
        $id = $this->{$attribute};
        $sizes = ['thump' => 100, 'low' => 400, 'med' => 800, 'high' => 1200];
        $folder = $sizes[$size] ?? $size;
        if (file_exists(storage_path("app/public/$folder/$id")))
            return url("storage/$folder/$id");
        return $this->{$attribute};
    }

    function getThumbAttribute()
    {
        return $this->getImage();
    }
}
