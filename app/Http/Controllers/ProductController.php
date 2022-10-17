<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('backend.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.products.create');
    }
    public function searchProducts(Request $request)
    {
        $search = $request->get('search');

        $products = DB::table('products')

        ->where('name', 'like', '%'.$search.'%')
        ->paginate(5);

        return view('backend.products.index', ['products' => $products]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $products)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'min:3|max:255',
            'description' => 'min:3|max:191',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'stocks' => 'required|numeric',
        ]);

        if ($validator->fails()) {

            return back()->with('toast_error', 'Something Went Wrong');
        }
        $product = Product::create([

            'name'                =>         $request->name,
            'description'       =>         $request->description,
            'price'            =>         $request->price,
            'quantity'            =>         $request->quantity,
            'stocks'                 =>         $request->stocks,

            ]);

            if(!$product){
                Alert::toast_error('Ooppppsss!', 'There was an error');
                return redirect()->back()->with('error', 'Sorry There is a problem in adding the product. ');
            }
            return redirect()->route('products.index')->with('toast_success', 'SuccessFully Added The Product.  ');
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
    public function edit(Product $product)
    {
        return view('backend.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->name                 =          $request->name;
        $product->description        =          $request->description;
        $product->price                  =          $request->price;
        $product->stocks                  =          $request->stocks;

        // if ($request->hasFile('image')){
        //     // Delete Old Image
        //     if($product->image) {
        //         Storage::delete($product->image);
        //     }

        //     //Store Image
        //     $image_path = $request->file('image')->store('products');

        //     $product->image = $image_path;

    Alert::success('Updated Successfully', 'Thank you');

    if (! $product->save()){
        return redirect()->route('products.index');
    }
    return redirect()->route('products.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();
        Alert::success('Deleted Successfully', 'Thank you');
         return redirect()->back()->with('Success', ' Deleted SuccessFully');
    }
}
