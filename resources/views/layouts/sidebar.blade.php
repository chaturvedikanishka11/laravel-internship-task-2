<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Blogs</a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
   
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Manage Blogs &nbsp; &nbsp; &nbsp; <i class="menu-icon fa fa-laptop"></i> </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a href="{{url('addblog')}}">Add Blog</a></li>
                            <li><i class="fa fa-list"></i><a href="{{url('viewblog')}}">View Blog</a></li>   
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Manage Keywords &nbsp; &nbsp; &nbsp; <i class="menu-icon fa fa-laptop"></i> </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a href="{{url('add_keyword')}}">Add Blog Keywords</a></li>
                            <li><i class="fa fa-list"></i><a href="{{url('view_keyword')}}">View Blog Keywords</a></li>   
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Manage BlogSeo &nbsp; &nbsp; &nbsp; <i class="menu-icon fa fa-laptop"></i> </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a href="{{url('add_blogseo')}}">Add BlogSeo </a></li>
                            <li><i class="fa fa-list"></i><a href="{{url('view_blogseo')}}">View BlogSeo</a></li>   
                        </ul>
                    </li>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
