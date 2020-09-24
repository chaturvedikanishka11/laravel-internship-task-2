<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Str;
use Input;
use App\blogcategory;
use App\blog;
class BlogController extends Controller
{
    public function addblog(Request $request)
    {
      if($request->isMethod('POST'))
    	{
    		$data = $request->all();
    		// echo "<pre>";print_r($data);die;
    		$blog = new blog;
            $blog->BlogCategoryID = $data['BlogCategoryID'];
    		$blog->Name = $data['Name'];
    		$blog->SubName = $data['SubName'];
    		$blog->Description = $data['Description'];
            // dd($blog->blogid);

    		//MAIN IMAGE STORE
            $url="http://127.0.0.1:8000/storage/";
            $file = $request->file('MainImage');
            $extension=$file->getClientOriginalExtension();
            $mainimgpath=$request->file('MainImage')->storeAs('blogs','MainImage' .time().'.'.
            $request->MainImage->extension());
            
            $blog->MainImage = $url.$mainimgpath;
             
            
            //BANNER IAMGE STORE
            $url="http://127.0.0.1:8000/storage/";
            $image = $request->file('BannerImage');
                 
            $extension=$file->getClientOriginalExtension();
            $bannerimgpath=$request->file('BannerImage')->storeAs('blogs','BannerImage' .time().'.'.
            $request->BannerImage->extension());
            $blog->BannerImage = $url.$bannerimgpath;

    		$blog->save();
    		return redirect('addblog')->with('flash_message_success','blogs added successfully!!');
    	}

      $blogcategory = blogcategory::get();
      return view('blogs.add')->with(compact('blogcategory'));
    }

    public function viewblog()
    {
        $blogs= blog::get();

        return view('blogs.view_blog')->with(compact('blogs'));
    }

    public function Status(Request $request)
    {
      $data = $request->all();
      // return ($data);
      blog::where('blogid','=',$data['id'])->update(['Status'=>$data['Status']]);
    }

    public function editblog(Request $request,$id)
    {
        if($request->isMethod('post'))
      {
     
        $blogs = $request->all();

         global $Bannerimage;
         global $Mainimage;

        if($request->hasfile('BannerImage'))
            {
                echo $main_img_tmp = Input::file('BannerImage');
                if($main_img_tmp->isValid())
                {

                    $url="http://127.0.0.1:8000/storage/";
                    $file = $request->file('BannerImage');
                         
                    $extension=$file->getClientOriginalExtension();
                    $bannerimgpath=$request->file('BannerImage')->storeAs('blogs','BannerImage' .time().'.'.$request->BannerImage->extension());
                    $BannerImage = $url.$bannerimgpath;
            }
            }
           else{
                $BannerImage = $blogs['current_BannerImage'];
            }

         if($request->hasfile('MainImage'))
            {
                echo $main_img_tmp = Input::file('MainImage');
                if($main_img_tmp->isValid())
                {

                   $url="http://127.0.0.1:8000/storage/";
                   $file = $request->file('MainImage');
                   $extension=$file->getClientOriginalExtension();
                   $mainimgpath=$request->file('MainImage')->storeAs('blogs','MainImage' .time().'.'.
                   $request->MainImage->extension());
                   
                   $MainImage = $url.$mainimgpath;
            }
            }  
            else{
                $MainImage = $blogs['current_main_image'];
            } 


            if(empty($blogs['Description'])){
                $blogs['Description'] = '';
            }
            blog::where(['blogid'=>$id])->update(['BlogCategoryID'=>$blogs['BlogCategoryID'],'Name'=>$blogs['Name'],'SubName'=>$blogs['SubName'],'Description'=>$blogs['Description'],'BannerImage'=>$BannerImage,'MainImage'=>$MainImage]);


          return redirect('viewblog')->with('flash_message_success','blogs has been updated!!');
       }

       $blogs =  blog::where('blogid','=',$id)->first();
       $blogcategory = blogcategory::get();

       return view('blogs.edit_blog')->with(compact('blogs','blogcategory'));
    }
      
    public function deleteblog($id)
    {
        blog::where('blogid','=',$id)->delete();
       return redirect('viewblog')->with('flash_message_success','blogs deleted successfully!!');

    }
}
