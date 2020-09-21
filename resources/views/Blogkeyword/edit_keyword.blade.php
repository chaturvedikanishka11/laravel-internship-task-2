@extends('layouts.master')
@section('data')
<div class="col-lg-12">
 <div class="card text-center">
  <br>
    <div class="card-header" style="background-color: #272c33;color: white;border-radius: 30px; font-size: 30px; ">
     <strong>EDIT BLOG KEYWORD</strong> 
    </div>
     <center> <div class="card-body card-block">
  <form action="{{url('edit_keyword/'.$blogkeyword->keywordid)}}" method="POST" class="form-horizontal col-md-6 " style="float: inherit;">

           @if(session('message'))

         <p class = "alert alert-success">
            {{session('message')}}
         </p>
         @endif
         <br>

        {{csrf_field()}}
    
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    
    <div class="row form-group">
    <div class="col col-md-3"><label>Blog Name</label></div>
    <div class="col-12 col-md-9">
    <select name="BlogID" id="BlogID" class="form-control">
    <option>Blog Name</option>
        @foreach($blogs as $keyword)
    <option value="{{$keyword->blogid}}"
        @if($keyword->blogid == $blogkeyword->BlogID) selected @endif > {{ $keyword->Name }}</option>
        @endforeach
    </select>
    </div>
    </div>

    <div class="row form-group">
    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">KeywordName</label></div>
    <div class="col-12 col-md-9"><input type="text" id="hf-email" name="KeywordName"  value="{{$blogkeyword->KeywordName}}" placeholder="Enter Keyword Name" class="form-control"></div>
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