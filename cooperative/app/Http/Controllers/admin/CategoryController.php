<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Advertising;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory()
    {
        return view('admin.create_category',[
            'menu'=>'categories',
            'selected'=>'createcategory'
            ]);
    }

    public function storeCategory(CategoryRequest $request)
    {
        $name = $request->input('name');
        $category = new Category();
        $category->name = $name;
        $result = $category->save();
        if ($result){
            return redirect()->route('Categories.admin')->with('success','دسته بندی جدید با موفقیت ایجاد شد.');
        }else{
            return redirect()->route('create_category.admin')->with('error','خطا در ایجاد دسته جدید.');
        }
    }
    public function Categories()
    {
        $categories = Category::all();
        return view('admin.categories',[
            'categories'=> $categories,
            'menu'=>'categories',
            'selected'=>'category'
        ]);

    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            $advertisings = Advertising::where('category_id', $category->id)->get();
            $result = $category->delete();
            foreach ($advertisings as $advertising) {
                $advertising->delete();
            }
            if ($result){

                return redirect()->route('Categories.admin')->with('success', 'با موفقیت حذف شد.');
            }else{
                return redirect()->route('Categories.admin')->with('error', 'با موفقیت حذف نشد.');

            }

        } else {
            return redirect()->route('Categories.admin')->with('error', 'حذف نشد.');
         }
    }
}
