<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonial;
use Image;
use Auth;

class TestimonialController extends Controller {

    function index(Request $request) {
        $query = Testimonial::query();
        if ($request->author_name) {
            $query->where('author_name', 'like', '%' . $request->author_name . '%');
        }
        if ($request->testimonial) {
            $query->where('testimonial', 'like', '%' . $request->testimonial . '%');
        }
        //$query->where('author_name', 'like', "%" . $request->title . "%")->orWhere('testimonial', 'like', "%" . $request->title . "%")->orWhere('country', 'like', "%" . $request->title . "%");
        $models = $query->paginate(50);

        return view('admin.testimonial.index', compact('models'));
    }

    public function create() {
        $models = Testimonial::all();
        return view('admin.testimonial.create', compact('$models'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'author_name' => 'required',
            'testimonial' => 'required',
            'created_on' => 'required',
            'author_img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $getimageName = time() . '.' . $request->author_img->getClientOriginalExtension();
        $request->author_img->move(public_path('images'), $getimageName);


        $data = $request->all();
        $data['author_img'] = $getimageName;
        Testimonial::create($data);
        return redirect()->route('testimonial.index')->with('success', 'Testimonial created successfully');
    }

    public function edit($id) {
        $models = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('models'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'author_name' => 'required',
            'testimonial' => 'required',
            'created_on' => 'required',
        ]);

        $file = $request->file('author_img');

        if ($file) {
            //echo 'ok';exit;
            $getimageName = time() . '.' . $request->author_img->getClientOriginalExtension();
            $request->author_img->move(public_path('images'), $getimageName);
            //$request->author_img = $getimageName;
            //
        } else {
            $getimageName = $request->author_img_old;
        }
        //$data['author_img']= $getimageName;
        $data = $request->all();
        //pr($data);exit;
        $data['author_img'] = $getimageName;


        Testimonial::find($id)->update($data);
        return redirect()->route('testimonial.index')->with('success', 'Testimonial updated successfully');
    }

    function show($id) {
        $models = Testimonial::find($id);
        return view('admin.testimonial.show', compact('models'));
    }

    public function destroy($id) {
        Testimonial::find($id)->delete();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted successfully');
    }

    public function search(Request $request) {

        $query = Testimonial::query();
        $query->where('author_name', 'like', "%" . $request->title . "%")->orWhere('testimonial', 'like', "%" . $request->title . "%")->orWhere('country', 'like', "%" . $request->title . "%");

        $models = $query->orderBy('id', 'DESC')->paginate(20);
        //print_r($models);exit();
        return view('admin.testimonial.index', compact('models'));
    }

}
