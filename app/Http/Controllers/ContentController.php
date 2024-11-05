<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Genre;
use App\Models\Category;
use App\Models\Season;
use App\Models\Content_genre;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->attributes->get('role') !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
        $contents = Content::with('category', 'season', 'thuocnhieuGenre')->orderBy('id', 'DESC')->get();
        $count = $contents->count();
        return view('admin.contents.index')->with(compact('contents', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::orderBy('id', 'DESC')->get();
        $genres = Genre::orderBy('id', 'DESC')->get();
        $seasons = Season::orderBy('id', 'DESC')->get();
        return view('admin.contents.create')->with(compact('categories','genres','seasons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data =$request->validate(
            [
                'title' => 'required|unique:contents|max:255',
                'description' => 'required',
                'activate' => 'required',
                'content_type' => 'required',
                'duration' => 'required',
                'start_date' => 'required',
                'genre' => 'required',
                'category_id' => 'required',
                'season_id' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                'trailer' => 'required|mimes:mp4,mov,avi,wmv|max:20480',
            ],
            [
                
                'title.required' => 'Chưa điền tên content !',
                'title.unique' => 'Tên content đã tồn tại !',
                'description.required' => 'Mô tả thiều rồi nhé !',
                'duration.required' => 'Chưa điền thời lượng !',
                'start_date.required' => 'Chưa điền ngày phát hành !',
                'start_date.date' => 'Ngày phát hành không hợp lệ !',
                'trailer.required' => 'Lỗi !',
            ]
        );
        $content = new Content();
        $content->title = $data['title'];
        $content->description = $data['description'];
        $content->duration = $data['duration'];
        $content->start_date = $data['start_date'];
        $content->category_id = $data['category_id'];
        $content->season_id = $data['season_id'];
        $content->activate = $data['activate'];
        $content->content_type = $data['content_type'];
        
        foreach ($data['genre'] as $key => $genre) {
            # code...
            $content->genre_id = $genre[0];
        }

        $get_image = $request->image;
        $path = 'storage/images';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $content->image = $new_image;

        $get_trailer = $request->file('trailer');
        $path = 'storage/trailer';
        $get_name_trailer = $get_trailer->getClientOriginalName();
        $name_trailer = current(explode('.', $get_name_trailer));
        $new_trailer = $name_trailer.rand(0,99).'.'.$get_trailer->getClientOriginalExtension();
        $get_trailer->move($path,$new_trailer);

        // dd($request->all()); // Kiểm tra tất cả dữ liệu gửi lên

        // dd($request->file('video'));

        $content->trailer = $new_trailer;

        $content->save();

        $content->thuocnhieuGenre()->attach($data['genre']);

        return redirect()->back()->with('status', 'Thêm content thành công !');
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
        $content = Content::findOrFail($id);
        $categories = Category::orderBy('id', 'DESC')->get();
        $seasons = Season::orderBy('id', 'DESC')->get();
        $genres = Genre::orderBy('id', 'DESC')->get();
        return view('admin.contents.edit')->with(compact('content', 'categories', 'seasons', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data =$request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required',
                'activate' => 'required',
                'content_type' => 'required',
                'duration' => 'required',
                'start_date' => 'required',
                'genre_id' => 'required',
                'category_id' => 'required',
                'season_id' => 'required',
            ],
            [
                
                'title.required' => 'Chưa điền tên content !',
                'description.required' => 'Mô tả thiều rồi nhé !',
                'duration.required' => 'Chưa điền thời lượng !',
                'start_date.required' => 'Chưa điền ngày phát hành !',
                'start_date.date' => 'Ngày phát hành không hợp lệ !',
            ]
        );

        $content = Content::findOrFail($id);
        $content->title = $data['title'];
        $content->description = $data['description'];
        $content->duration = $data['duration'];
        $content->start_date = $data['start_date'];
        $content->category_id = $data['category_id'];
        $content->season_id = $data['season_id'];
        $content->activate = $data['activate'];
        $content->content_type = $data['content_type'];

        foreach ($data['genre'] as $key => $genre) {
            # code...
            $content->genre_id = $genre[0];
        }

        $get_image = $request->image;
        if($get_image){
            $path1 = 'storage/images/'.$content->image;
            if(file_exists($path1)){
                unlink($path1);
            }
            $path = 'storage/images';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

            $content->image = $new_image;
        }
        $get_trailer = $request->file('trailer');
        if($get_trailer){
            $path1 = 'storage/trailer/' . $content->trailer;
            if(file_exists($path1)){
                unlink($path1);
            }
            $path = 'storage/trailer';
            $get_name_trailer = $get_trailer->getClientOriginalName();
            $name_trailer = current(explode('.', $get_name_trailer));
            $new_trailer = $name_trailer.rand(0,99).'.'.$get_trailer->getClientOriginalExtension();
            $get_trailer->move($path,$new_trailer);

            $content->trailer = $new_trailer;
        }
        // dd($request->all()); // Kiểm tra tất cả dữ liệu gửi lên

        // dd($request->file('video'));

        $content->save();

        $content->thuocnhieuGenre()->attach($data['genre']);

        return redirect()->back()->with('status', 'Cập nhật content thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
