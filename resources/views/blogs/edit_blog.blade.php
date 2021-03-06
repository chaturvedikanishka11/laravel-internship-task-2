@extends('layouts.master')
@section('data')
<div class="col-lg-12">
 <div class="card text-center">
  <br>
    <div class="card-header" style="background-color: #272c33;color: white;border-radius: 30px; font-size: 30px; ">
     <strong>EDIT BLOG</strong> 
    </div>
     <center> <div class="card-body card-block">
    <form action="{{url('editblog/'.$blogs->blogid)}}" method="POST" class="form-horizontal col-md-6 " enctype="multipart/form-data" style="float: inherit;">


        {{csrf_field()}}
    
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    
    <div class="row form-group">
    <div class="col col-md-3"><label>Blog Category</label></div>
    <div class="col-12 col-md-9">
    <select name="BlogCategoryID" id="BlogCategoryID" class="form-control">
    <option>Blog Category ID</option>
        @foreach($blogcategory as $blogid)
    <option value="{{$blogid->categoryid}}"
        @if($blogid->categoryid == $blogs->BlogCategoryID) selected @endif > {{ $blogid->CategoryName }}</option>
        @endforeach
    </select>
    </div>
    </div>

    <div class="row form-group">
    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Name</label></div>
    <div class="col-12 col-md-9"><input type="text" id="hf-email" name="Name"  value="{{$blogs->Name}}" placeholder="Enter Name" class="form-control"></div>
    </div>

    <div class="row form-group">
    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Sub Name</label></div>
    <div class="col-12 col-md-9"><input type="text" id="hf-email" name="SubName"  value="{{$blogs->SubName}}" placeholder="Enter SubName" class="form-control"></div>
    </div>

    <div class="row form-group">
    <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Banner Image</label></div>
    <div class="col-12 col-md-9"><input type="file" id="BannerImage" name="BannerImage" placeholder="" class="form-control">
    <input type="hidden" name="current_BannerImage" value="{{$blogs->BannerImage}}">@if(!empty($blogs->BannerImage))
    <img src="{{$blogs->BannerImage}}" alt="" style="width:100px;">
    @endif

    </div>
    </div>

    <div class="row form-group">
    <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Main Image</label></div>
    <div class="col-12 col-md-9"><input type="file" id="MainImage" name="MainImage" placeholder="MainImage" class="form-control">
    <input type="hidden" name="current_main_image" value="{{$blogs->MainImage}}">@if(!empty($blogs->MainImage))
    <img src="{{$blogs->MainImage}}" alt="" style="width:100px;">
    @endif

    </div>
    </div>

    <div class="row form-group">
    <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Description</label></div> 
    <div class="col-12 col-md-9">
    <textarea  type="text" class="form-control" placeholder="Enter Category Description" name="Description" 
     id="mytextarea">{{$blogs->Description}}</textarea>
    </div>
    </div> 

    <div class="card-footer">
    <button type="submit" class="btn btn-primary btn-sm">
    submit
    </button>
    <button type="reset" class="btn btn-danger btn-sm">
    <i class="fa fa-ban"></i> Reset
    </button></center>
   </div>
    </form>                             

</div>

</div>
@endsection