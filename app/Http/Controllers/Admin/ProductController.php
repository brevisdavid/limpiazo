<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(4);
        return view('admin.products.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'name.required'=> 'Debes ingresar nombre del producto',
            'name.min'=> 'El numero de caracteres debe terner minio 3',
            'description.max'=> 'AH sobrepasado numero de caracteres',
            'description.required'=> 'Debes ingresar descripcion del producto',
            'price.required'=> 'Debes ingresar precio del producto',
            'price.numeric'=> 'Ingrese precio valido ',
            'price.min'=> 'No se admiten valores negativos ',
            'long_description.required'=> 'Ingrese una descripcion detallada'
         ];

        //validar que los campos sean llenados y restricciones
        $rules=[
          "name"=> 'required|min:3',
          "description"=> 'required|max:200',
          "price"=> 'required|numeric|min:0',
          "long_description"=>'required' 
        ];
        $this->validate($request,$rules,$messages);
        $product=new Product();
        $product->name = $request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->stock=$request->input('stock');
        $product->long_description=$request->input('long_description');
        $product->save();
        return redirect('/admin/products');
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
        $product=Product::find($id);
        return view('admin.products.edit')->with(compact('product'));    
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
        $messages=[
            'name.required'=> 'Debes ingresar nombre del producto',
            'name.min'=> 'El numero de caracteres debe terner minio 3',
            'description.max'=> 'AH sobrepasado numero de caracteres',
            'description.required'=> 'Debes ingresar descripcion del producto',
            'price.required'=> 'Debes ingresar precio del producto',
            'price.numeric'=> 'Ingrese precio valido ',
            'price.min'=> 'No se admiten valores negativos ',
            'long_description.required'=> 'Ingrese una descripcion detallada'
         ];

        //validar que los campos sean llenados y restricciones
        $rules=[
          "name"=> 'required|min:3',
          "description"=> 'required|max:200',
          "price"=> 'required|numeric|min:0',
          "long_description"=>'required' 
        ];
        $this->validate($request,$rules,$messages);
        $product=Product::find($id);
        $product->name = $request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->long_description=$request->input('long_description');
        $product->save();
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return back();
    }
}
