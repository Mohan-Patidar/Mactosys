<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->id();
        $products =Product::where('user_id',$id)->get();

        $users=User::where('id',$id)->get();
        foreach($users as $user){
            $con_id= unserialize($user->connected_id);
        }
        $cproducts =Product::where('user_id',$con_id)->get();

        return view('admin.product.index',compact("products","cproducts","con_id"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([]);

        $products = new Product;
        $products->product_name = $request->product_name;
        $products->product_description = $request->product_description;
        if ($request->hasFile('product_image')) {

            $profile = $request->file('product_image');
            $file_name = time() . '.' . $profile->getClientOriginalExtension();
            $path = public_path('../image/product_image');
            $profile->move($path, $file_name);
            $products->product_image = $file_name;
        } else {
            $products->product_image = "";
        }
        $products->user_id=$request->user_id = Auth::user()->id;
        $products->save();

        return redirect('products');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function UserConnection()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('admin.connect.index',compact("users"));
    }
    public function UserAdd(Request $request)
    {
        $id = auth()->id();
        $connnected_id = serialize($request->get('connected_id'));
        $users =User::where('id',$id)->update(["connected_id"=>$connnected_id]);
        
        return redirect('products');
    }
}
