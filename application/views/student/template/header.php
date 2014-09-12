<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sales Invoice System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link href="<?php echo CSS.'bootstrap.css';?>" rel="stylesheet">
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }



      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      #wrap > .container {
        padding-top: 60px;
      }
      .container .credit {
        margin: 20px 0;
      }

      code {
        font-size: 80%;
      }

    </style>
    <link href="<?php echo CSS.'bootstrap-responsive.css';?>" rel="stylesheet">

   
  </head>

  <body>


    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
       <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo URL.'index.php/Student/';?>">Student</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
               <li>  <a href="<?php echo URL.'index.php/Student/';?>">Home</a>  </li>
             <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Message  <span class="badge badge-warning">6</span></a>
                  <ul class="dropdown-menu">
                      <li><a href="<?php echo URL.'index.php/Student/inbox';?>">Inbox <?php for($i=0;$i<=12;$i++) echo'&nbsp;';?><span class="badge badge-important">6</span></a></li>
                    <li><a href="<?php echo URL.'index.php/Student/sentbox';?>">Sent</a></li>
                    
                  </ul>
            </li>
           
            
             <li>  <a href="<?php echo URL.'index.php/Student/directory';?>">Directory</a>  </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notice <span class="badge badge-important">6</span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo URL.'index.php/Student/noticeboard';?>">Global<?php for($i=0;$i<=12;$i++) echo'&nbsp;';?><span class="badge badge-important">6</span></a></li>
                    <li><a href="<?php echo URL.'index.php/Student/noticeboard';?>">Departmental</a></li>
                   
                  </ul>
            </li>
             <li>  <a href="<?php echo URL.'index.php/Student/complaint';?>">Complaint</a>  </li>
            </ul>
            <ul class="nav pull-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">DashBoard</a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo URL.'index.php/Student/edit_profile';?>">Edit Profile</a></li>
                    <li><a href="<?php echo URL.'index.php/Student/settings';?>">Change Password</a></li>
                    <li><a href="<?php echo URL.'index.php/login/logout';?>">Logout</a></li>
                  </ul>
            </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    
      <!-- Begin page content -->
      <div class="container">
        <?php if($this->session->flashdata('message')){?>  
   <div class="alert alert-<?php echo $this->session->flashdata('type'); ?>">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?php echo $this->session->flashdata('caption'); ?></strong>
  <?php echo $this->session->flashdata('message'); ?>
   </div>
     <?php } ?>