<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photos;

class AdminMediasController extends Controller
{
    public function index(){
        $photo = Photos::all();
        return view('admin.media.index')->with('photo',$photo);
    }
    public function create(){
        return view('admin.media.create');
    }
    public function store(Request $request){
        $file = $request->file('file');
        $name = time() .$file->getClientOriginalName();
        $file->move('images',$name);
        Photos::create(['photo'=>$name]);

    }
    public function destroy($id){
      $photo = Photos::findOrFail($id);

        // unlink(public_path().'/images/'.$photo->photo);

        $photo->delete();

        return redirect('admin/media');
    }
}
