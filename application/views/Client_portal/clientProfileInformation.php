<?php include('header.php');?>
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

	/*.nav-link{*/
	/*	font-weight: 500;*/
	/*    color: #14264d;*/
	/*    font-family: system-ui;*/
	/*    font-size: 16px;*/
	/*}*/
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
    .nav-link {
        cursor: pointer;
    }
    .card {
        border-radius: 12px;
    }
    .card-header {
        border-bottom: none;
    }
    .list-group-item {
        border: none;
        padding-left: 0;
    }
    .bg-purple{
        background-color: #14264d;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background-color: #fff!important;
        color: #14264d!important;
    }
    .nav-pills .nav-link{
        color: #fff!important;
    }
    .card h5 {
        text-transform: uppercase;
        font-weight: 600;
    }
</style>
<?php include('navigation.php');?>
<div class="page-content">
  <!-- Breadcrumb -->
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profile Information</li>
    </ol>
  </div>
   <!-- Dashboard Header -->
    <div class="container">
	    <div class="dashboard-tab-wrapper mb-3">
		  <div class="dashboard-tab">PROFILE INFORMATION</div>
		  <div class="dashboard-line"></div>
	    </div>
        <div class="row justify-content-center">
            <!-- Left Sidebar -->
            <div class="col-md-4">
              <div class="card shadow-sm p-4 text-center">
                <img src="https://aa.boffinweb.com/assets/img/user.jpg" class="rounded-circle mx-auto mb-3" width="100" height="100" alt="Profile">
                <h5 class="mb-0">Uttam Patel</h5>
                <small class="text-muted">uttam@boffinweb.com</small>
                <hr>
                <p class="text-muted mb-1"><i class="fa fa-phone"></i> +91 8423533858</p>
                <p class="text-muted"><i class="fa fa-map-marker"></i> Lucknow, India</p>
                <a href="<?php echo base_url('clientProfileEdit'); ?>" class="btn btn-purple btn-sm mt-2">Edit Profile</a>
                <a href="<?php echo base_url('logout'); ?>" class="btn btn-outline-danger btn-sm mt-2 dismiss">Logout</a>
              </div>
            </div>

            <!-- Right Content Area -->
            <div class="col-md-8">
              <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-purple text-white d-flex justify-content-between align-items-center">
                  <span><i class="fa fa-user mr-2"></i>Profile Details</span>
                  <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#info">General Information</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#security">Security</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body tab-content">
                  <!-- Info Tab -->
                  <div class="tab-pane fade show active" id="info">
                    <p><strong>Name:</strong> Boffin Web Technology</p>
                    <p><strong>Email:</strong> boffinwebs@gmail.com</p>
                    <p><strong>Phone:</strong> +91 8423533858</p>
                    <p><strong>Joined:</strong> April 2023</p>
                  </div>    
        
                  <!-- Security Tab -->
                  <div class="tab-pane fade" id="security">
                    <p><strong>Password:</strong> ********</p>
                    <a href="#" class="btn btn-sm btn-outline-warning">Change Password</a>
                    <hr>
                    <p><strong>2FA:</strong> Not Enabled</p>
                    <a href="#" class="btn btn-sm btn-outline-secondary">Enable 2FA</a>
                  </div>
                </div>
              </div>
            </div>
  </div>

	</div>


<footer class="text-center py-3">
    <div class="container">
         &copy; 2025 Accurex Accounting | Powered by <a href="https://boffinweb.com" target="_blank">Boffin Web Technology</a>
    </div>
</footer>
<?php include('footer.php');?>
