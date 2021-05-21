@extends('layouts.adminlayout')
@section('content')
<div class="page-inner ad-inr">
    <div style="display: none;" class="error"></div>
    @if(Session::has('message'))
    <div class="save-alert alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <p>{{ Session::get('message') }}</p>
    </div>
    @endif
    <section class="main-wrapper">
        <div class="page-color">
            <div class="page-inr">
                <div class="tabel-head">
                    <div class="tabel-head-right">
                        <div class="page-btn">
                            <a href="{{route('products.create')}}" class="add-btn ">Add Product</a>
                        </div>
                    </div>
                </div>
                <p>Product list (product added by logged user)</p>
                    <div class="page-table" id="dvData">
                        <table id="" class="producttable tabel-res table-striped" style="width:100%;" data-plugin-options='{"searchPlaceholder": "Suchen"}'>
                            <thead>
                                <tr>
                                    <th class="width-30">S.No</th>
                                    <th>Product Image</th>
                                    <th class="width-160">Product Name</th>
                                    <th>Product Description</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="result">
                            @php $i = 0; @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>@php echo ++$i @endphp</td>
                                    <td><img class="product-img"  src="{{asset('image/product_image/' .$product->product_image) }}" /></td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_description}}</td>
                                    <td>@php $created_at = explode(' ',$product->created_at);
                                        echo $created_at[0]; @endphp
                                   
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <p>Product list added by another user connected with logged user</p>
                    <div class="page-table" id="dvData">
                        <table id="" class="producttable tabel-res table-striped" style="width:100%;" data-plugin-options='{"searchPlaceholder": "Suchen"}'>
                            <thead>
                                <tr>
                                    <th class="width-30">S.No</th>
                                    <th>Product Image</th>
                                    <th class="width-160">Product Name</th>
                                    <th>Product Description</th>
                                    <th>Uploaded By</th>
                                </tr>
                            </thead>
                            <tbody id="result">
                            @php $i = 0; @endphp
                            @foreach($cproducts as $product)
                                <tr>
                                    <td>@php echo ++$i @endphp</td>
                                    <td><img class="product-img"  src="{{asset('image/product_image/' .$product->product_image) }}" /></td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_description}}</td>
                                    <td>@php  $name= App\Models\User::where('id',$con_id)->get(); 
                                        foreach($name as $n){
                                        echo $n->name; 
                                        }
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


            </div>
        </div>
    </section>
</div>

@endsection