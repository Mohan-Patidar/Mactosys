@extends('layouts.adminlayout')

@section('content')
<div class="page-inner ad-inr">
   
    <section class="main-wrapper">
        <div class="page-color">
            <div class="page-header">
                <div class="page-title">
                    <h3>Add <span> Product</span></h3>
                    <a href="{{url('/products')}}" class="add-btn">
                        <span>
                            <img src="{{url('/')}}/assets/image/Icon-arrow-back.svg" class="btn-arrow-show" alt="">
                            <img src="{{url('/')}}/assets/image/Icon-arrow-back-2.svg" class="btn-arrow-hide" alt="">
                        </span>
                        <span>Back</span>
                    </a>
                </div>
            </div>
            <div class="page-table">
            @if(Session::has('message'))
    <div class="p-relative">
    <div class="save-alert alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <p>{{ Session::get('message') }}</p>
    </div>
    </div>
    @endif
                <div class="profile-box container-fluid">
                    <form class="add-student-form" method="Post" action="{{route('products.store')}}" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <input type="text" name="product_description" id="">
                                </div>
                            </div>
                            <div class="col-md-6 last-input-margin">
                                <div class="form-group">
                                    <label>Product Image </label>
                                    <input type="file" name="product_image" id="">
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <input type="submit" name="save" class="add-btn" id="save" value="Add Product">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('additionalscripts')
@endsection