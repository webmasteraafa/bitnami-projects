<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="/AppStudio/main_files/index.php">Application Studio Dashboard</a></div>
  <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/AppStudio/profile/view_profiles.php?SA=<?php echo $SA?>&user=<?php echo $user?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
<div class="navbar-default sidebar" role="navigation">
<div class="sidebar-nav navbar-collapse">
<ul class="nav" id="side-menu">
<li class="sidebar-search">
<div class="input-group custom-search-form">
<input type="text" class="form-control" placeholder="Search...">
<span class="input-group-btn">
<button class="btn btn-default" type="button">
<i class="fa fa-search"></i>
</button>
</span>
</div>
<!-- /input-group -->
</li>
<li>
<a href="/AppStudio/main_files/index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
</li>
<li>
<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Profile<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
<li>
<li><a href="/AppStudio/profile/index.php">Dashboard</a></li>
</ul>
<!-- /.nav-second-level -->
</li>
<li>
<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> State Honor Roll Data<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
<li>
<li><a href="/AppStudio/statehonorroll/index.php">Dashboard</a></li>
<li><a href="/AppStudio//statehonorroll/state_information.php">2017 Form (click state to update)</a>
</li>
<li>
<a href="/AppStudio//statehonorroll/shr_2016_data.php">2016 Form</a>
</li>
<li>
<a href="/AppStudio//statehonorroll/state_information.php">Update data (click state to update)</a>
</li>
<li>
<a href="/AppStudio//statehonorroll/state_information.php"><i class="fa fa-table fa-fw"></i> View State Data</a>
</li>
</ul>
<!-- /.nav-second-level -->
</li>
<li>
<a href="#"><i class="fa fa-wrench fa-fw"></i> Support Groups<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
<li><a href="/AppStudio/supportgroups/index.php">Dashboard</a></li>
<li>
<a href="/AppStudio/supportgroups/support_information.php">Update a Support Group</a>
</li>
<li>
<a href="/AppStudio/supportgroups/support_group_form.php">Add a Support Group</a>
</li>
<li>
<a href="/AppStudio/supportgroups/support_information.php">View Support Groups</a>
</li>
</ul>
<!-- /.nav-second-level -->
</li>
<li>
<a href="#"><i class="fa fa-table fa-fw"></i> Web Content Gallery<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">

<li>
<a href="/AppStudio/webcontent/index.php">Dashboard</a>
</li>

<li>
<a href="/AppStudio/webcontent/sliders_kfa.php?Group=All">KFA Sliders</a>
</li>

<li>
<a href="/AppStudio/webcontent/slider_aafa.php?Group=All">AAFA Slider</a>

</li>
<li><a href="/AppStudio/webcontent/index.php">Add New Slider</a>
<ul>
<li>
<a href="/AppStudio/webcontent/add_slider_form_AAFA.php">AAFA</a>
</li>
<li>
<a href="/AppStudio/webcontent/add_slider_form_KFA.php">KFA</a>
</li>
</ul>
</li>
<li>
<a href="/AppStudio/webcontent/index.php">Content Viewer</a>
</li>
 
</ul>
</li>
<li>
<a href="#"><i class="fa fa-edit fa-fw"></i> Image Application<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
<li><a href="/AppStudio/imageapp/index.php">Dashboard</a></li>
<li><a href="/AppStudio/imageapp/create_album.php">Create Albums</a></li>
<li><a href="/AppStudio/imageapp/create_category.php">Create Categories</a></li>
<li><a href="/AppStudio/imageapp/image_upload.php">Add Images</a>
</ul>

</li>
<li>
<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
<li>
<a href="login.html">Login Page</a>
</li>
</ul>
<!-- /.nav-second-level -->
</li>
</ul>
</div>
<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
