 @extends('layouts.master')
 @section('data')




 <div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">

    <div class="col-md-12">

      <div id="message_success" style="display:none;" class="alert alert-success"> Status Enabled </div>

      <div id="message_error" style="display:none;" class="alert alert-danger"> Status Disabled </div>

      @if(session('flash_message_success'))

         <p class = "alert alert-success">
            {{session('flash_message_success')}}
         </p>
         @endif
         <br>

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">BLOGS LIST</strong>
                            </div>
                            <div class="card-body">
                                
                                    <table id="table_id" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Blog ID</th>
                                            <th>Name</th> 
                                            <th>Sub Name</th>
                                            <th>Banner Image</th>
                                            <th>Main Image</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=1; ?>
                                        @foreach($blogs as $blogs)

                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td>{{$blogs->Name}}</td>
                                            <td>{{$blogs->SubName}}</td>
                                            <td>
                                             @if(!empty($blogs->BannerImage))
                                             <img src="{{asset('/upload/bannerimage/'.$blogs->BannerImage)}}" alt="" style="width:100px;">
                                            </td>
                                             @endif
                                             
                                             <td>
                                             @if(!empty($blogs->MainImage))
                                             <img src="{{asset('/upload/mainimage/'.$blogs->MainImage)}}" alt="" style="width:100px;">
                                            </td>
                                             @endif
                                    
                                             <td>{{ Str::limit($blogs->Description, 10) }}</td>

                                          <td>
                                          <input type="checkbox" class="Blogstatus btn btn-success" rel="{{$blogs->blogid}}" data-toggle="toggle" data-on="Enabled" data-of="Disabled" @if($blogs['Status']=="1") checked @endif>
                                          <div id="myElem" style="display:none;" class="alert alert-success">
                                             Status Enabled
                                          </div>
                                          </td>

                                            <td>
                                          
                                          <a href="{{url('editblog/'.$blogs->blogid)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a> 
                                          <a href="{{url('deleteblog/'.$blogs->blogid)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                       </td>
                                        </tr>
                                        @endforeach

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        @endsection