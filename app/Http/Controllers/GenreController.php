<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $genres = Genre::orderBy('id', 'DESC')->get();
        return view('admin.genres.index')->with(compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data =$request->validate(
            [
                'name' => 'required|unique:genres|max:255',
                'slug' => 'required|unique:genres|max:255',
                'activate' => 'required',
            ],
            [
                'name.required' => 'Chưa điền tên genre !',
                'name.unique' => 'Tên genre đã tồn tại !',
                'slug.required' => 'Slug thiều rồi nhé !',
                'slug.unique' => 'Slug có rồi nhé !',
            ]
        );
        $genre = new Genre();
        $genre->name = $data['name'];
        $genre->slug = $data['slug'];
        $genre->activate = $data['activate'];

        $genre->save();

        return redirect()->back()->with('status', 'Thêm genre thành công !');
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
        $genre = Genre::findOrFail($id);
        return view('admin.genres.edit')->with(compact('genre'));
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
                'slug' => 'required|max:255',
                'activate' => 'required',
            ],
            [
                'name.required' => 'Chưa điền tên genre !',
                'slug.required' => 'Slug thiều rồi nhé !',
            ]
        );
        $genre = Genre::findOrFail($id);
        $genre->name = $data['name'];
        $genre->slug = $data['slug'];
        $genre->activate = $data['activate'];

        $genre->save();

        return redirect()->back()->with('status', 'Cập nhật genre thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
