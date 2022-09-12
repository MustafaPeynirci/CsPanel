<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::query()->paginate(12);
    }
   public function store(Request $request)
    {
        $this->validate($request,[
            "name"      => "required",
            "content"   => "required",
            "image1"     => "required"
        ],[
            "name.required"     =>  "Kategori Adı Giriniz!",
            "content.required"  =>  "İçerik Giriniz!",
            "image1.required  "  =>  "Resim Ekleyiniz!",
        ]);

        if($request->has('image1')){
            $randomize = rand(111111, 999999);
            $extension = $request->file('image1')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $image = $request->file('image1')->move('images/categories/', $filename);
            $request->merge([
                "image"    => 'http://127.0.0.1:8000/'.$image
            ]);
        }
        $category = new Category($request->all());
        $category->save();
        return response()->json('Kategori Başarıyla Eklendi!',200);
    }
    public function show($id)
    {
        $category = Category::query()->where('id','=', $id)->get();
        return (sizeof($category)) ?  $category[0] : response()->json('Sayfa Bulunamadı!',404);
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->has('image1')){
            if($category->image){
                $oldimg = explode('http://127.0.0.1:8000/', $category->image);
                File::delete($oldimg);
            }
            $randomize = rand(111111, 999999);
            $extension = $request->file('image1')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $image = $request->file('image1')->move('images/categories/', $filename);
            $request->merge([
                "image"    => 'http://127.0.0.1:8000/'.$image
            ]);
        }
        $category->update($request->all());
        return response()->json('Kategori Başarıyla Güncellendi!',200);
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $oldimg = explode('http://127.0.0.1:8000/', $category->image);
        File::delete($oldimg);
        $category->destroy($id);
        return response()->json('Kategori Başarıyla Silindi!',200);
    }
}
