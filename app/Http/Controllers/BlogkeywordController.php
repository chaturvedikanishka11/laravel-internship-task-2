<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\blogkeyword;
class BlogkeywordController extends Controller
{
    public function add_keyword(Request $request)
    {
     if($request->isMethod('POST'))
      {
    		$data = $request->all();
    		// echo "<pre>";print_r($data);die;
    		    $blogid = new blogkeyword;
            $blogid->BlogID = $data['BlogID'];
    		    $blogid->KeywordName = $data['KeywordName'];

    		$blogid->save();
    	return redirect('add_keyword')->with('flash_message_success','Blogkeyword added successfully!!');
      }

    	$blogid = blog::where('blogid','>',0)->get();
    	return view('Blogkeyword.add_keyword',compact('blogid'));
    }

    public function view_keyword()
    {
    	$blogs= blogkeyword::get();

        return view('Blogkeyword.view_keyword',compact('blogs'));
    }

    public function edit_keyword(Request $request,$id)
    {
        if($request->isMethod('post'))
      {
     
        $blogkeyword = $request->all();

        blogkeyword::where(['keywordid'=>$id])->update(['BlogID'=>$blogkeyword['BlogID'],'KeywordName'=>$blogkeyword['KeywordName']]);


          return redirect('view_keyword')->with('flash_message_success','Blogkeyword has been updated!!');
       }

       $blogkeyword =  blogkeyword::where('keywordid','=',$id)->first();
       $blogs = blog::get();

       return view('Blogkeyword.edit_keyword')->with(compact('blogkeyword','blogs'));
    }

    public function delete_keyword($id)
    {
        blogkeyword::where('keywordid','=',$id)->delete();
       return redirect('view_keyword')->with('flash_message_success','Blogkeyword deleted successfully!!');

    }

    public function Keyword_Status(Request $request)
    {
      $data = $request->all();
      // return ($data);
      blogkeyword::where('keywordid','=',$data['id'])->update(['Status'=>$data['Status']]);
    }
}
