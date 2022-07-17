<?php

namespace App\Http\Controllers;

use App\Models\BlogCategories;
use App\Models\Blogs;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Http\Request;

class blogsController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->filterDate)){
            $blogsData = Blogs::with('categories.category')->whereDate('created_at', Carbon::createFromFormat('d/m/Y', $request->filterDate)->format('Y-m-d'))->get();
        }else{
            $blogsData = Blogs::with('categories.category')->get();
        }
        return view('blog.blogsList', compact('blogsData'));
    }

    public function create(Request $request)
    {
        $categories = Categories::pluck('name', 'id')->toArray();
        return view('blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'categories' => 'required' 
        ]);
        $blog = Blogs::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        foreach($request->categories as $categoryId){
            BlogCategories::create([
                'blog_id' => $blog->id,
                'category_id' => $categoryId
            ]);
        }
    }
}
