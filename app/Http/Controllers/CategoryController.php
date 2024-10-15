<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data =$request->validate(
            [
                'name' => 'required|unique:categories|max:255',
                'description' => 'required|max:255',
                'slug' => 'required|unique:categories|max:255'
            ],
            [
                'name.required' => 'Chưa điền tên category !',
                'name.unique' => 'Tên category đã tồn tại !',
                'description.required' => 'Mô tả thiều rồi nhé !',
                'slug.required' => 'Slug thiều rồi nhé !',
                'slug.unique' => 'Slug có rồi nhé !',
            ]
        );
        $category = new Category();
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->slug = $data['slug'];

        $category->save();

        return redirect()->back()->with('status', 'Thêm category thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.categories.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data =$request->validate(
            [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'slug' => 'required|max:255'
            ],
            [
                'name.required' => 'Chưa điền tên category !',
                'description.required' => 'Mô tả thiều rồi nhé !',
                'slug.required' => 'Slug thiếu rồi nhé !',
            ]
        );
        $category = Category::findOrFail($id);
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->slug = $data['slug'];

        $category->save();

        return redirect()->back()->with('status', 'Cập nhật category thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
