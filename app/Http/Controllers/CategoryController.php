<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);

        return view('backend.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $categories = DB::table('categories')
        ->where('name', 'like', '%'.$search.'%')
        ->paginate(5);
        return view('backend.category.index', ['categories' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $categories)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'min:3|max:255',
            'description' => 'min:3|max:191',
            'warranty' => 'required|numeric',
        ]);

        if ($validator->fails()) {

            return redirect()->route('categories.index')->with('toast_error', 'Something Went Wrong');
        }



           $categories = new Category;

            $categories->name = $request->name;
            $categories->description = $request->description;
            $categories->warranty = $request->warranty;
            $categories->save();

            if($categories){
                return redirect()->back()->with('toast_success', 'Created Sucessfully');

            }
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $categories = Category::find($id);

        if(!$categories){
            return back()->with('error', 'Something went wrong');
        }
        Alert::success('Updated Successfully', 'Thank you');
        $categories->update($request->all());
        return back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);

        if(!$categories){
            return back()->with('error', 'Something went wrong');
        }
        Alert::success('Deleted Successfully', 'Thank you');
        $categories->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
