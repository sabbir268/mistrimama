<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blogs;
use App\Http\Requests\BlogsCreate;
use App\Http\Requests\BlogsUpdate;
use Image;
use App\BlogCategory;
use Auth;
use App\EmailTemplate;
use Illuminate\Support\Carbon;

class BlogsController extends Controller {

    public function index(Request $request) {

        $query = Blogs::query();
        if ($request->title) {
            $query->where('title', 'like', "%" . $request->title . "%");
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }


        $models = $query->with('category')->orderBy('id', 'DESC')->paginate(20);

        $category = BlogCategory::all()->pluck('title', 'id');

        return view('admin.blogs.index', compact('models', 'category'));
    }

    public function create() {
        $category = BlogCategory::all()->pluck('title', 'id');
        return view('admin.blogs.create', compact('category'));
    }

    public function store(BlogsCreate $request) {
        try {
            $blog_slug = $request->slug;
            
            $checkBlog = Blogs::where('slug', $blog_slug)->first();

            if ($checkBlog) {

                $blog_slug .= $blog_slug . "_" . $request->id;
            }
            $input = $request->all();
            $image = $request->file('image');
            $input['image'] = time() . "-" . uniqid() . '.' . $image->getClientOriginalExtension();
            $ogImagePath = public_path('images/blogs/thumbnail');
            $img = Image::make($image->getRealPath());
            $img->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ogImagePath . '/' . $input['image']);
            //$input['url'] = createUrl($request->url);
            $input['slug'] = $blog_slug;
            $input['users_id'] = Auth::user()->id;
            if ($request->featured_post == "on") {
                $featured_post = Carbon::now();
                $input['featured_post'] = $featured_post;
            }

            //pr($input);exit;
            Blogs::create($input);
            $request->session()->flash('success', 'Blog has been successfully added!');

            return redirect(route('blogs.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = Blogs::find($id);
        return view('admin.blogs.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = Blogs::find($id);
        //pr($model);
        $category = BlogCategory::all()->pluck('title', 'id');
        return view('admin.blogs.edit', compact('model', 'category'));
    }

    public function update(BlogsUpdate $request, $id) {
        try {
            $model = Blogs::find($id);
            $input = $request->all();
            
            
            $image = $request->file('image');
            if ($image) {
                $input['image'] = time() . "-" . uniqid() . '.' . $image->getClientOriginalExtension();
                $ogImagePath = public_path('images/blogs/thumbnail');
                $img = Image::make($image->getRealPath());
                $img->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($ogImagePath . '/' . $input['image']);
            } else {
                unset($input['image']);
            }
            //$input['url'] = createUrl($request->url);
            
            $input['featured_post'] = ($request->featured_post == "on") ? Carbon::now() : NULL;
            $model->update($input);

            $request->session()->flash('success', 'Blog has been successfully Updated!');
            return redirect(route('blogs.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
        $role = Blogs::findOrFail($id);
        $role->forceDelete();
        return redirect()->back();
    }
    public function getSlug(Request $request)
    {
        $slug = $request->get('slug');
        $blog_slug = myCreateUrl($slug);
        return response()->json(['blog_slug' => $blog_slug]);
    }

}
