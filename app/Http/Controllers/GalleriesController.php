<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Request\GalleryRequest;
use Session;

use App\Gallery;

use File;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();

        return view('galleries.index')->with('galleries',$galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:200',

        ]);


        $imageName = date('YmdHis').'.'.$request->image->getClientOriginalName();
        $request->image->move(public_path('upload_images/'), $imageName);

        $save = new Gallery;
        $save->tittle = $request->tittle;
        $save->image = $imageName;
        $save->description = $request->description;

        $save->save();

        return redirect()
            ->route('root')

            ->with('notice','Image Uploaded Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $galleries = Gallery::find($id);

        // return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);

        return view('galleries.edit')->with('gallery', $gallery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $upload = Gallery::find($id);

        if ($request->hasFile('image')) {
            $galleries = Gallery::find($id);
            $gallery = $galleries->image;
            File::delete('upload_images/'.$gallery);

            $file = $request->file('image');
            $destination_path = 'upload_images/';
            $filename = date('YmdHis').'-'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $upload->image = $filename;
        }

        $upload->tittle = $request->input('tittle');
        $upload->description = $request->input('description');
        $upload->save();

        Session::flash("notice", "Gallery success updated");

        return redirect()->route('root');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galleries = Gallery::find($id);
        $gallery = $galleries->image;
        File::delete('upload_images/'.$gallery);

        Gallery::destroy($id);
        return redirect()
          ->route('root')

          ->with('notice','Gallery success deleted.');    
    }
}
