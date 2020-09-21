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

    		if($request->hasfile('BannerImage'))
    		{
    			echo $main_img_tmp = Input::file('BannerImage');
    			if($main_img_tmp->isValid())
    			{

                    $file = $request->file('BannerImage');
    	            $filename = 'BannerImage'.time().'.'.$request->BannerImage->extension();
    	            $file->move('upload/bannerimage',$filename);

    			   $blog->BannerImage = $filename;
    		}
            }
            else
            {
            	$blog->BannerImage = " "; 
            }

            if($request->hasfile('MainImage'))
    		{
    			echo $main_img_tmp = Input::file('MainImage');
    			if($main_img_tmp->isValid())
    			{

                    $image = $request->file('MainImage');
    	            $imagename = 'MainImage'.time().'.'.$request->MainImage->extension();
    	            $image->move('upload/mainimage',$imagename);

    			   $blog->MainImage = $imagename;
    		}
            }
            else
            {
            	$blog->MainImage = " "; 
            }

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

        if($request->hasfile('BannerImage'))
            {
                echo $main_img_tmp = Input::file('BannerImage');
                if($main_img_tmp->isValid())
                {

                    $file = $request->file('BannerImage');
                    $filename = 'BannerImage'.time().'.'.$request->BannerImage->extension();
                    $file->move('upload/bannerimage',$filename);

                   $blogs->BannerImage = $filename;
            }
            }
           else{
                $filename = $blogs['current_BannerImage'];
            }

         if($request->hasfile('MainImage'))
            {
                echo $main_img_tmp = Input::file('MainImage');
                if($main_img_tmp->isValid())
                {

                    $image = $request->file('MainImage');
                    $imagename = 'MainImage'.time().'.'.$request->MainImage->extension();
                    $image->move('upload/mainimage',$imagename);

                   $blogs->MainImage = $imagename;
            }
            }  
            else{
                $imagename = $blogs['current_main_image'];
            } 


            if(empty($blogs['Description'])){
                $blogs['Description'] = '';
            }
            blog::where(['blogid'=>$id])->update(['BlogCategoryID'=>$blogs['BlogCategoryID'],'Name'=>$blogs['Name'],'SubName'=>$blogs['SubName'],'Description'=>$blogs['Description'],'BannerImage'=>$filename,'MainImage'=>$imagename]);


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
