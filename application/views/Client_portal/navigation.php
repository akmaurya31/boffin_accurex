<style type="text/css">
	.logo{
		width: 100%;
	}
	nav#uk_header {
	    /* border-bottom: 1px solid #ccc; */
	    box-shadow: 0px 0px 5px 0px #ccc;
	    background: #fff;
	}
	.navbar>.container-fluid{
		display: block;
	}

	.nav-link{
		font-weight: 500;
	    color: #14264d;
	    font-family: system-ui;
	    font-size: 16px;
	}
	li.nav-item {
	    padding: 0px 15px;
	}
	.user {
	    border-left: 2px solid #182a50;
	    padding-left: 15px;
	    color: #14264d;
	    font-weight: 500;
	}
	.page-content{
		margin-top: 100px;
	}
	.section-header {
      background-color: #14264d;
      color: white;
      padding: 10px 20px;
      font-weight: bold;
    }
    .box {
      background-color: white;
      padding: 15px;
      border-radius: 4px;
      margin-bottom: 20px;
    }
    .breadcrumb {
      background-color: transparent;
      padding-left: 0;
    }
    body{
    	background: #0002390d;
    }
    .dashboard-tab-wrapper {
	  position: relative;
	  margin-bottom: 15px;
	}

	.dashboard-tab {
	  background-color: #14264d;
	  color: white;
	  font-weight: bold;
	  padding: 10px 25px;
	  display: inline-block;
	  border-top-left-radius:10px;
	  border-top-right-radius: 10px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}

	.dashboard-line {
	  height: 2px;
	  background-color: #14264d;
	  width: 100%;
	  margin-top: -2px;
	}
	.breadcrumb-item a{
		color: #14264d;
	}

	.navbar{
		padding: 1rem 1rem;
	}
	
	.btn-purple {
        background-color: #f75c1e;
        color: #fff;
        line-height: 35px;
        font-weight: 600;
        padding: 5px 30px;
    }

    .btn-purple:hover {
        background-color: #14264d;
        color: #fff;
    }

    .text-purple {
        color: #f75c1e;
    }

    .text-purple:hover {
        text-decoration: underline;
    }
    .dismiss {
        border: 1px solid #ccc;
        padding: 5px 30px;
        line-height: 35px;
        font-weight: 600;
    }
    .dismiss:hover{
        background-color: #14264d;
        color: #fff;
    }
    .user a {
        color: rgba(0,0,0,.5);
        text-decoration: none;
    }
    .user.active a {
        color: #14264d;
    }
</style>
<?php 
    $uri =  $this->uri->segment(1);

?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="uk_header">
	<div class="container">
	  <a class="navbar-brand" href="#">
	    <img src="<?php echo base_url('assets/images/logo_client.png');?>" alt="Logo" height="40">
	  </a>

	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
	    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
	    <ul class="navbar-nav">

	      <li class="nav-item <?php if($uri=='ClientDashboard'){ echo "active";}?>">
	        <a class="nav-link" href="<?php echo base_url('ClientDashboard');?>">
		        <i class="fa fa-dashboard"></i> Dashboard
		    </a>
	      </li>
	      <li class="nav-item <?php if($uri=='ClientsNotification'){ echo "active";}?>">
	        <a class="nav-link" href="<?php echo base_url('ClientsNotification');?>">
	        	<i class="fa fa-bell-o"></i> Notifications
	        </a>
	      </li>
	      <li class="nav-item <?php if($uri=='ClientsAddNewJobs'){ echo "active";}?>">
	        <a class="nav-link" href="<?php echo base_url('ClientsAddNewJobs');?>">
	        	<i class="fa fa-folder-o"></i> New Job
	        </a>
	      </li>

	      <li class="nav-item <?php if($uri=='ClientsJobsList'){ echo "active";}?>">
	        <a class="nav-link" href="<?php echo base_url('ClientsJobsList');?>">
	        	<i class="fa fa-folder-open-o"></i> Jobs
	        </a>
	      </li>
	    </ul>
	    <div class="user <?php if($uri=='clientProfileInformation'){ echo "active";}?>"">
	    	<a href="<?php echo base_url('clientProfileInformation');?>">
	    		<i class="fa fa-user-o"></i>
	    		Rahul Sinha
	    	</a>
	    </div>
	  </div>
	</div>
</nav>