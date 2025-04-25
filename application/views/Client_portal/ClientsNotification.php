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
	  width: 100%;
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
	.modal-title {
        margin-bottom: 0;
        line-height: 1.5;
        font-size: 20px;
        color: #14264e;
    }
    
</style>
<?php include('navigation.php');?>
<div class="page-content">
  <!-- Breadcrumb -->
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Notification</li>
    </ol>
  </div>
   <!-- Dashboard Header -->
    <div class="container bg-white pt-3">
	    <div class="dashboard-tab-wrapper mb-3">
		  <div class="dashboard-tab">NOTIFICATION</div>
		  <div class="dashboard-line"></div>
	    </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover ">
                <thead>
                    <tr>
                        <th width="80">Sr. No.</th>
                        <th>Job Heading</th>
                        <th width="180">Status</th>
                        <th width="200">Date</th>
                        <th width="80">Read</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01.</td>
                        <td> Meena Kumari-PTR-05-04-2020(RS) </td>
                        <td><span class="success-badge">Job Completed</span></td>
                        <td>12 April 2025, 10:30PM</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#viewNotification"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>02.</td>
                        <td> Meena Kumari-PTR-05-04-2020(RS) </td>
                        <td><span class="success-badge">Job Completed</span></td>
                        <td>12 April 2025, 10:30PM</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#viewNotification"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>03.</td>
                        <td> Meena Kumari-PTR-05-04-2020(RS) </td>
                        <td><span class="success-badge">Job Completed</span></td>
                        <td>12 April 2025, 10:30PM</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#viewNotification"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                     <tr>
                        <td>04.</td>
                        <td> Meena Kumari-PTR-05-04-2020(RS) </td>
                        <td><span class="success-badge">Job Completed</span></td>
                        <td>12 April 2025, 10:30PM</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#viewNotification"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                     <tr>
                        <td>05.</td>
                        <td> Meena Kumari-PTR-05-04-2020(RS) </td>
                        <td><span class="danger-badge">Job On Hold</span></td>
                        <td>12 April 2025, 10:30PM</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#viewNotification"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                     <tr>
                        <td>06.</td>
                        <td> Meena Kumari-PTR-05-04-2020(RS) </td>
                        <td><span class="success-badge">Job Completed</span></td>
                        <td>12 April 2025, 10:30PM</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#viewNotification"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                     <tr>
                        <td>07.</td>
                        <td> Meena Kumari-PTR-05-04-2020(RS) </td>
                        <td><span class="warning-badge">Job Under Review</span></td>
                        <td>12 April 2025, 10:30PM</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#viewNotification"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                     <tr>
                        <td>08.</td>
                        <td> Meena Kumari-PTR-05-04-2020(RS) </td>
                        <td><span class="success-badge">Job Completed</span></td>
                        <td>12 April 2025, 10:30PM</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#viewNotification"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr> 
                    <tr>
                        <td>09.</td>
                        <td> Meena Kumari-PTR-05-04-2020(RS) </td>
                        <td><span class="success-badge">Job Completed</span></td>
                        <td>12 April 2025, 10:30PM</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#viewNotification"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
	    </div>
	</div>
</div>

<!-- modal for Read Notification -->
<div class="modal fade" id="viewNotification" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Meena Kumari-PTR-05-04-2020(RS)</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        <div class="modal-body">
            <p class="paragraph">Explore the powerful features of the client portal for greater clarity, focus and vision for your business. Let’s navigate through them to help you monitor your progress, track jobs and forecast profits for your business.</p>
            <p class="paragraph">Explore the powerful features of the client portal for greater clarity, focus and vision for your business. Let’s navigate through them to help you monitor your progress, track jobs and forecast profits for your business.</p>
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
