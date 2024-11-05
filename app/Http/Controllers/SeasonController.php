<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Season;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->attributes->get('role') !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
        $seasons = Season::orderBy('id', 'DESC')->get();
        return view('admin.seasons.index')->with(compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.seasons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data =$request->validate(
            [
                'season_number' => 'required|unique:seasons|max:255',
                'title' => 'required|unique:seasons|max:255',
                'description' => 'required|max:255',
            ],
            [
                'season_number.required' => 'Chưa điền tên season !',
                'title.required' => 'Chưa điền tên season !',
                'season_number.unique' => 'Tên season đã tồn tại !',
                'description.required' => 'Mô tả thiều rồi nhé !',
            ]
        );
        $season = new Season();
        $season->season_number = $data['season_number'];
        $season->description = $data['description'];
        $season->title = $data['title'];

        $season->save();

        return redirect()->back()->with('status', 'Thêm season thành công !');
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
    public function edit(string $id, Request $request)
    {
        if($request->attributes->get('role') !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
        $season = Season::findOrFail($id);
        return view('admin.seasons.edit')->with(compact('season'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data =$request->validate(
            [
                'season_number' => 'required|max:255',
                'title' => 'required|max:255',
                'description' => 'required|max:255',
            ],
            [
                'season_number.required' => 'Chưa điền tên season !',
                'title.required' => 'Chưa điền tên season !',
                'description.required' => 'Mô tả thiều rồi nhé !',
            ]
        );
        $season = Season::findOrFail($id);
        $season->season_number = $data['season_number'];
        $season->description = $data['description'];    
        $season->title = $data['title'];

        $season->save();

        return redirect()->back()->with('status', 'Thêm season thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
