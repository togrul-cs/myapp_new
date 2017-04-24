<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    //
    public function index(){

        $photos = Photo::all();


        return view('admin.media.index', compact('photos'));

    }

    public function create(){

        return view('admin.media.create');

    }


    public function store(Request $request){

        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);


        Photo::create(['path'=>$name]);

    }


    public function destroy($id){

        $photo = Photo::findOrFail($id);

        $path = public_path() . $photo->path;

        if(File::exists($path)) {

            File::delete($path);

        }

        $photo->delete();

        Session::flash('deleted_media', 'The photo has been deleted');

        return redirect('/admin/media');



    }




}
