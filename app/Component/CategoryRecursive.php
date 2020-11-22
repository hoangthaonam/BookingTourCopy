<?php
namespace App\Component;
use App\Models\Category;
class CategoryRecursive {
    protected $html = '';
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
}
?>