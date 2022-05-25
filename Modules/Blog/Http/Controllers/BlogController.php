<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Blog\Entities\Blog;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $blogs = Blog::paginate(2);
        return view('blog::index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Blog::create([
            'name' => $request->name,
            'type' => $request->type,
            'details' => $request->details,

        ]);

        return redirect()->route('blog.index');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Blog $blog)
    {
        return view('blog::edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->update([
            'name' => $request->name,
            'type' => $request->type,
            'details' => $request->details,

        ]);
        return redirect()->route('blog.index')->with('message','Blog updated.');
    }



    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('message', 'Blog deleted');
    }
    

}
