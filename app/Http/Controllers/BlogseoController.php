<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\blogseo;

class BlogseoController extends Controller
{
    public function add_blogseo(Request $request)
    {
     if($request->isMethod('POST'))
      {
    		$data = $request->all();
    		// echo "<pre>";print_r($data);die;
    		    $blogseo = new blogseo;
                $blogseo->BlogID = $data['BlogID'];
    		    $blogseo->MetaTitle = $data['MetaTitle'];
    		    $blogseo->MetaDescription = $data['MetaDescription'];
    		    $blogseo->MetaKeyword = $data['MetaKeyword'];

    		$blogseo->save();
    	return redirect('add_blogseo')->with('flash_message_success','Blogseo added successfully!!');
      }

    	$blogseo = blog::where('blogid','>',0)->get();
    	return view('Blogseo.add_blogseo',compact('blogseo'));
    }

    public function view_blogseo()
    {
    	$seo= blogseo::get();
        return view('Blogseo.view_blogseo')->with(compact('seo'));
    }

    public function edit_blogseo(Request $request,$id)
    {
        if($request->isMethod('post'))
      {
     
        $blogseo = $request->all();

        blogseo::where(['SeoID'=>$id])->update(['BlogID'=>$blogseo['BlogID'],'MetaTitle'=>$blogseo['MetaTitle'],'MetaDescription'=>$blogseo['MetaDescription'],'MetaKeyword'=>$blogseo['MetaKeyword']]);


          return redirect('view_blogseo')->with('flash_message_success','Blogseo has been updated!!');
       }

       $blogseo =  blogseo::where('SeoID','=',$id)->first();
       $blogs = blog::get();

       return view('Blogseo.edit_blogseo')->with(compact('blogseo','blogs'));
    }

    public function delete_blogseo($id)
    {
        blogseo::where('SeoID','=',$id)->delete();
       return redirect('view_blogseo')->with('flash_message_success','Blogseo deleted successfully!!');

    }

    public function Blogseo_Index(Request $request)
    {
      $data = $request->all();
       // return ($data);
      blogseo::where('SeoID','=',$data['id'])->update(['IndexFollow'=>$data['IndexFollow']]);
    }
}
