<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $category = Category::latest()->paginate(10);
        return view('admin.pages.category.index', compact('category'));
    }

    public function create()
    {
        
        return view('admin.pages.category.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $requestData = $request->all();
        Category::create($requestData);
        return redirect('admin/category')->with('flash_message', 'Category added!');
    }

    public function show()
    {
        $events = Event::all();
        return view('admin.pages.category.show', compact('events'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.category.edit', compact( 'category'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $category = Category::findOrFail($id);
        $category->update($requestData);

        return redirect('admin/category')->with('flash_message', 'Category updated!');
    }

    public function destory($id)
    {
        Category::destroy($id);
        return redirect('admin/category')->with('flash_message', 'Category deleted!'); 
    }
}
