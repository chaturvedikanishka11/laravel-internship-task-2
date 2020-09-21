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
                                <strong class="card-title">BLOG KEYWORDS LIST</strong>
                            </div>
                            <div class="card-body">
                                
                                    <table id="table_id" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Keyword ID</th>
                                            <th>Keyword Name</th> 
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=1; ?>
                                        @foreach($blogs as $blogs)

                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td>{{$blogs->KeywordName}}</td>

                                          <td>
                                          <input type="checkbox" class="KeywordStatus btn btn-success" rel="{{$blogs->keywordid}}" data-toggle="toggle" data-on="Enabled" data-of="Disabled" @if($blogs['Status']=="1") checked @endif>
                                          <div id="myElem" style="display:none;" class="alert alert-success">
                                             Status Enabled
                                          </div>
                                          </td>

                                            <td>
                                          
                                          <a href="{{url('edit_keyword/'.$blogs->keywordid)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a> 
                                          <a href="{{url('delete_keyword/'.$blogs->keywordid)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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