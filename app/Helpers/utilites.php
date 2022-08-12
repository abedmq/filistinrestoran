<?php


use Intervention\Image\Facades\Image;

function settings($key, $defaultValue = false)
{
    $settings = \Illuminate\Support\Facades\Cache::remember('settings', 5000,
        function () {
            return \App\Models\Setting::get()->pluck('value', 'key')->toArray();
        }
    );
    return (isset($settings[$key]) ? $settings[$key] : ($defaultValue ?: ''));
}

function resize_image($name)
{
    $imgName = \Illuminate\Support\Str::replaceFirst('public/original/', '', $name);
    $imgName = \Illuminate\Support\Str::replaceFirst('original/', '', $imgName);
    $path = storage_path("app/$name");
    if (file_exists($path)) {
        $img = Image::make($path);
        image_resize_width($imgName, $img, 100);
        image_resize_width($imgName, $img, 400);
        image_resize_width($imgName, $img, 800);
        image_resize_width($imgName, $img, 1200);
        return $imgName;
    }
    return false;
}

function image_resize_width($name, $img, $with)
{
    $tmpImg = clone $img;
    $tmpImg->resize($with, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    $newPath = storage_path("app/public/$with");
    if (!file_exists($newPath)) {
        mkdir($newPath);
    }
    $newPath .= "/" . $name;
    $tmpImg->save($newPath);
    return $newPath;
}

function get_images_group($id, $sizes = ['thump' => 100, 'low' => 400, 'med' => 800, 'high' => 1200])
{
    $images = [];
    foreach ($sizes as $key => $size) {
        if (!$id) {
            $images[$key] = '';
        } else {
            $path = storage_path("app/public/$size/$id");
            if (file_exists($path)) {
                $images[$key] = url("storage/$size/$id");
            }
        }
    }
    if ($id)
        $images['original'] = url('storage/original/' . $id);
    else
        $images['original'] = '';
    return $images;
}

function get_social($name)
{
    if (settings($name))
        return "<li><a class='$name' href='".settings($name)."'><i class='ion-social-$name'></i></a></li>";
    return '';
}

function get_default_language_id($isObj = false)
{

    $lang = \App\Models\Language::where('is_default', 1)->first();

    return $isObj && $lang ? $lang : (@$lang->id ?: 1);
}

function get_language_id_by_code($code)
{
    return \Illuminate\Support\Facades\Cache::remember('language' . $code, 3000, function () use ($code) {
        return \App\Models\Language::where('code', $code)->first()->id;
    });
}

function custom_format($number)
{
    return number_format($number, 2, '.', '');
}


function get_whatsapp_url()
{
    return 'https://wa.me/' . settings('whatsapp') . '?text=';
}
