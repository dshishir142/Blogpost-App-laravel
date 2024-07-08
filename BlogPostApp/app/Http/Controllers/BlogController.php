<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $table_data = new Blog();

        $table_data->title = $request->title;
        $table_data->description = $request->description;
        $table_data->user_id = $request->userid;
        $table_data->category= $request->category;

        
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/demo/', $filename);
        $table_data->image = $filename;

        $table_data->save();
        return redirect('/home');

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
        $blogToEdit = Blog::with('user')->find($id);
        return view('edit')->with('blog', $blogToEdit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category = $request->category;

        if ($request->hasFile('image')) {
            File::delete("uploads/demo/" . $blog->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/demo/', $filename);
            $blog->image = $filename;
        }
        $blog->save();

        return redirect('/home');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $toDelete = Blog::find($id);
        File::delete('uploads/demo'. $toDelete->image);
        $toDelete->delete();
        return redirect('/home');
    }
}
