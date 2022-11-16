<?php

namespace App\Http\Controllers;

use App\Models\Category;

use http\Message;
use Illuminate\Http\Request;
use Picqer;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('created_at',"DESC")->get();

        return view('categories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required|min:2|max:50|unique:categories'
        ]);

        $product_code=rand(106890122,100000000);
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode=$generator->getBarcode($product_code, $generator::TYPE_STANDARD_2_5,2,60);
        $category=new Category();
        $category->name=$request->name;
        $category->category_code=$product_code;
        $category->barcode=$barcode;
        $category->save();


            flash('Category Added Successfully')->success();

        return redirect()->route('categories.index');

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
        $category=Category::findorFail($id);

        return view('categories.edit',compact('category'));



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
        $this->validate($request,[
            'name'=>'required|min:2|max:50|unique:categories,name,'.$id
        ]);

        $category=Category::findOrFail($id);

        $category->name=$request->name;
        $category->save();

        flash('Category Updated Successfully')->success();

        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        flash('Category Deleted Successfully')->success();

        return redirect()->route('categories.index');
    }



    public function createBarcode(){

        return view('barcode');

    }
}
