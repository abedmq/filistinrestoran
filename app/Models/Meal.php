<?php

namespace App\Models;

use App\Helpers\Datatable;
use App\Traits\ActiveTrait;
use App\Traits\ImageTrait;
use App\Traits\LanguageTrait;
use App\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    use ActiveTrait, SortableTrait, LanguageTrait, Datatable, ImageTrait;

    protected $guarded = [];
    protected $appends = ['translates', 'thumb'];

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function getPrice($formated=true){
        return $this->price. ($formated?"ليرة":"");
    }

    function scopeSearch($q)
    {
        $query = request('query');
        $search = is_string($query) ? $query : (data_get($query, 'query', ''));
        if ($search)
            $q->where('title', 'like', "%$search%");
        if ($category_id = data_get($query, 'category_id')) {
            $q->where('category_id', "$category_id");

        }
    }
}
