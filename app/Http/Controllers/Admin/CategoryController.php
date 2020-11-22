<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Component\CategoryRecursive;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $html = '';

    public function __construct() {
        $categoryRecursive = new CategoryRecursive();
        $this->html = $categoryRecursive->recursive();
    }

    public function index()
    {
        $data = $this->html;
        return view('Admin.Category.Category',compact('data'));
    }

    public function recursive($id = 0, $prefix = '')
    {
        # code...
        $categories = Category::all();
        foreach($categories as $value){
            if($value->parent_id == $id){
                $this->html .= "<option value=".$value->categories_id.">".$prefix.$value->name."</option>";
                $this->recursive($value->categories_id, $prefix.'---');
            }
        }
        return $this->html;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        $cate = Category::find($id);
        $categories = Category::where('categories_id','<>',$id)->get();
        return view('Admin.Category.Edit_category',compact('cate','categories'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(CategoryRequest $request, $id)
    {
        $cate = Category::find($id);
        $cate->name = $request->name;
        $cate->parent_id = $request->parent_id;
        $cate->save();
        return redirect()->route('category.index');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index');
    }
    public function showDelete($id)
    {
        $category = Category::find($id);
        return view('Admin.Category.Delete_category',compact('category'));
    }
}
