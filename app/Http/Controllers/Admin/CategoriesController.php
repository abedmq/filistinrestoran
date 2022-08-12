<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\CreateUpdateCategoryeRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends BaseController
{

    protected $modelClass = Category::class;
    protected $title = 'التصنيفات';
    protected $route = 'categories';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function show(Category $category)
    {
        return redirect()->back()->with('msg','لا يوجد تفاصيل');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateCategoryeRequest $request)
    {
        //
        return $this->saveData($request->validated());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateCategoryeRequest $request, Category $category)
    {
        //
        return $this->saveData($request->validated(), $category);
    }

    public function saveData($data, $item = null)
    {
        unset($data['image']);
        if (\request()->image) {
            $name = \request()->image->store("original");
            $imgName = resize_image($name);
            if ($imgName)
                $data['image'] = $imgName;
        }
        return parent::saveData($data, $item); // TODO: Change the autogenerated stub
    }

}
