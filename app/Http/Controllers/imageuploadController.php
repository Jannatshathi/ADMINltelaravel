<?php

namespace App\Http\Controllers;

use App\Models\Imageupload;
use Illuminate\Http\Request;

class imageuploadController extends Controller
{
    public function index()
    {
//           get all datas from table
        $files = Imageupload::all();
        // see all datas in index.blade.php
        return view('pages.dragUpload.index', compact('files'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {   // ths is for create.blade.php
        return view('pages.dragUpload.create');
    }


    public function store(Request $request)
    {  // save all new uploade in table
        $image = $request->file('file');
        $FileName = $image->getClientOriginalName();
        $image->move(public_path('images'), $FileName); // save all image in a file to name images in laravel app

        $imageUpload = new Imageupload();
        $imageUpload->filename = $FileName;
        $imageUpload->save();
        return response()->json(['success' => $FileName]);
    }


   public function destroy($id)
    {
      // remove or delete from table
        $fileUpload = Imageupload::find($id);

        $fileUpload->delete();

        return redirect()->back()
            ->with('success', 'File deleted successfully');
    }

}
