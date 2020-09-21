<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <script src="https://cdn.tiny.cloud/1/lw0q03z6xj6ymm37c25kwz2py7qcxi71rz8qak18786lfxbc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800')}}" rel='stylesheet' type='text/css'>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css">



      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet"/>

</head>

<body>


@include('layouts.sidebar')
@include('layouts.header')




<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- Gmaps -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2jlT6C_to6X1mMvR9yRWeRvpIgTXgddM"></script>
    <script src="{{asset('vendors/gmaps/gmaps.min.js')}}"></script>
    <script src="{{asset('assets/js/init-scripts/gmap/gmap.init.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
  
  <!-- ----------------------BLOG STATUS Script--------------------- -->

    <script>
        $(document).ready( function () {
           $(".Blogstatus").change(function(){
            var id= $(this).attr('rel');
           // alert(id);
            var _token = $('input[name="_token"]').val();
            if($(this).prop('checked')==true){
              $.ajax({
              
                type: 'post',
                url:  '/update-status',
                data:{Status:'1',id:id, _token:_token},
                success:function(data){
                  $("#message_success").show();
                  setTimeout(function(){
                    $("#message_success").fadeOut('slow');},2000);
                },
                error:function(){
                  alert("Error");
                }

              });
            }
            else{
               $.ajax({
                type: 'post',
                url:  '/update-status',
                data:{Status:'0',id:id, _token:_token},
                success:function(resp){
                  $("#message_error").show();
                  setTimeout(function(){
                    $("#message_error").fadeOut('slow');},2000);
                },
                error:function(){
                  alert("Error");
                }

              });
            }


           });



             } );
    </script>

  <!-- --------------------BLOGKEYWORD STATUS Script-------------- -->

    <script>
        $(document).ready( function () {
           $(".KeywordStatus").change(function(){
            var id= $(this).attr('rel');
            // alert(id);
            var _token = $('input[name="_token"]').val();
            if($(this).prop('checked')==true){
              $.ajax({
              
                type: 'post',
                url:  '/Keyword_Status',
                data:{Status:'1',id:id, _token:_token},
                success:function(data){
                  $("#message_success").show();
                  setTimeout(function(){
                    $("#message_success").fadeOut('slow');},2000);
                },
                error:function(){
                  alert("Error");
                }

              });
            }
            else{
               $.ajax({
                type: 'post',
                url:  '/Keyword_Status',
                data:{Status:'0',id:id, _token:_token},
                success:function(resp){
                  $("#message_error").show();
                  setTimeout(function(){
                    $("#message_error").fadeOut('slow');},2000);
                },
                error:function(){
                  alert("Error");
                }

              });
            }


           });



             } );
    </script>
  
  <!-- ---------------------BLOGSEO INDEXFOLLOW Script-------------------------- -->

    <script>
        $(document).ready( function () {
           $(".BlogseoIndex").change(function(){
            var id= $(this).attr('rel');
            // alert(id);
            var _token = $('input[name="_token"]').val();
            if($(this).prop('checked')==true){
              $.ajax({
              
                type: 'post',
                url:  '/Blogseo_Index',
                data:{IndexFollow:'1',id:id, _token:_token},
                success:function(data){
                  $("#message_success").show();
                  setTimeout(function(){
                    $("#message_success").fadeOut('slow');},2000);
                },
                error:function(){
                  alert("Error");
                }

              });
            }
            else{
               $.ajax({
                type: 'post',
                url:  '/Blogseo_Index',
                data:{IndexFollow:'0',id:id, _token:_token},
                success:function(resp){
                  $("#message_error").show();
                  setTimeout(function(){
                    $("#message_error").fadeOut('slow');},2000);
                },
                error:function(){
                  alert("Error");
                }

              });
            }


           });



             } );
    </script>



      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js "></script>

      <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2jlT6C_to6X1mMvR9yRWeRvpIgTXgddM"></script>


     <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
 -->
</body>

</html>