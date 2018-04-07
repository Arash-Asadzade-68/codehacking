<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{
    //
    public function index()
    {
        $photos = Photo::paginate(3);

        return view('admin.media.index', compact('photos'));
    }

    public function show($id)
    {
        $this->destroy($id);
    }

    public function create()
    {
        return view('admin.media.create');
    }


    public function store(Request $request)
    {
        $path = $request->file('file');
        $name = time() . $path->getClientOriginalName();
        $path->move('images', $name);
        Photo::create(['path' => $name]);

    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
            if ($photo) {
                unlink(public_path() . $photo->path);
            }

        $photo->delete();
        return redirect('admin/media');
    }


    public function deleteMedia(Request $request)
    {

        if(!empty($request->checkboxArray)) {
            $photos = Photo::findOrFail($request->checkboxArray);

            foreach ($photos as $photo) {
                $photo->delete();
            }
            return redirect()->back();

        }else
        {
            return redirect()->back();
        }
    }


}
