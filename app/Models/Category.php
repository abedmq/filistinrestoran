<?php

namespace App\Models;

use App\Helpers\Datatable;
use App\Traits\ActiveTrait;
use App\Traits\ImageTrait;
use App\Traits\LanguageTrait;
use App\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use ActiveTrait, SortableTrait, LanguageTrait, Datatable, ImageTrait;

    protected $guarded = [];
    protected $appends = ['translates'];

    function meals(){
        return $this->hasMany(Meal::class);
    }

    function scopeSearch($q)
    {
        $query = request('query');
        $query = is_string($query) ? $query : (data_get($query,'query',''));

        if ($query)
            $q->where('title', 'like', "%$query%");
    }
}
