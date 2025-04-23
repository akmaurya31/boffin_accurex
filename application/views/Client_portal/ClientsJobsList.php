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
	#pills-tab .nav-item{
	    padding: 0px;
	}
	.jobTabs {
        background: #fff;
        padding: 20px 20px;
    }
    
    td.actions a {
        border: 1px solid #ccc;
        padding: 5px 8px;
        font-size: 14px;
        margin: 2px;
        color: #14264d;
        text-decoration: none;
    }
    td, th {
        border: 1px solid #dee2e6;
        font-family: "Inter", sans-serif;
        font-size: 14px;
    }
    .jobTabs ul li a{
        font-family: "Inter", sans-serif;
        font-size: 14px;
    }
</style>
<?php include('navigation.php');?>
<div class="page-content">
  <!-- Breadcrumb -->
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Jobs<li>
    </ol>
  </div>
   <!-- Dashboard Header -->
    <div class="container">
	    <div class="dashboard-tab-wrapper mb-3">
		  <div class="dashboard-tab">JOBS</div>
		  <div class="dashboard-line"></div>
	   </div>
	    <div class="jobTabs">
            <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tabs-live-tab" data-toggle="tab" data-type="live" href="#tabs-live" role="tab" aria-controls="tabs-live" aria-selected="true">Live Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tabs-hold-tab" data-toggle="tab" data-type="hold" href="#tabs-hold" role="tab" aria-controls="tabs-hold" aria-selected="false">On Hold Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tabs-completed-tab" data-toggle="tab"  data-type="completed" href="#tabs-completed" role="tab" aria-controls="tabs-completed" aria-selected="false">Completed Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tabs-draft-tab" data-toggle="tab" data-type="draft" href="#tabs-draft" role="tab" aria-controls="tabs-draft" aria-selected="false">Draft Job</a>
                </li>
            </ul>

 


<!-- 🔍 Common Search Inputs -->
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 140px;"><input type="text" class="form-control" placeholder="Search Job Code"></th>
                <th><input type="text" class="form-control" placeholder="Search Job Name"></th>
                <th style="width: 120px;"><input type="text" class="form-control" placeholder="Search Status"></th>
                <th style="width: 120px;"><input type="text" class="form-control" placeholder="Search Sub Status"></th>
                <th style="width: 120px;"><input type="text" class="form-control" placeholder="Search Recieved On"></th>
                <th><input type="text" class="form-control" placeholder="Search Comments"></th>
                <th style="width: 150px;"></th>
            </tr>
        </thead>
    </table>
</div>

<!-- 🔄 Tab Contents -->
<div class="tab-content" id="tabs-tabContent">

    <!-- ✅ Live Tab -->
    <div class="tab-pane fade show active" id="tabs-live" role="tabpanel">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Job Code</th>
                        <th>Job Name</th>
                        <th>Status</th>
                        <th>Sub Status</th>
                        <th>Recieved On</th>
                        <th>Job Comments</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tabContent-live"></tbody>
            </table>
        </div>
        <nav><ul id="pagination-live" class="pagination"></ul></nav>
    </div>

    <!-- ✅ Hold Tab -->
    <div class="tab-pane fade" id="tabs-hold" role="tabpanel">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Job Code</th>
                        <th>Job Name</th>
                        <th>Status</th>
                        <th>Sub Status</th>
                        <th>Recieved On</th>
                        <th>Job Comments</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tabContent-hold"></tbody>
            </table>
        </div>
        <nav><ul id="pagination-hold" class="pagination"></ul></nav>
    </div>

    <!-- ✅ Completed Tab -->
    <div class="tab-pane fade" id="tabs-completed" role="tabpanel">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Job Code</th>
                        <th>Job Name</th>
                        <th>Status</th>
                        <th>Sub Status</th>
                        <th>Recieved On</th>
                        <th>Job Comments</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tabContent-completed"></tbody>
            </table>
        </div>
        <nav><ul id="pagination-completed" class="pagination"></ul></nav>
    </div>

    <!-- ✅ Draft Tab -->
    <div class="tab-pane fade" id="tabs-draft" role="tabpanel">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Job Code</th>
                        <th>Job Name</th>
                        <th>Status</th>
                        <th>Sub Status</th>
                        <th>Recieved On</th>
                        <th>Job Comments</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tabContent-draft"></tbody>
            </table>
        </div>
        <nav><ul id="pagination-draft" class="pagination"></ul></nav>
    </div>

</div>



        </div>
	</div>
	  


	<script>

$(document).ready(function () {
    let currentTab = "live";
    let currentPage = 1;

    function loadJobs(tabType, page = 1) {
        currentTab = tabType;
        currentPage = page;
        var r1 = '.table-responsive input.form-control';
        let searchInputs = {};
        $(r1).each(function (index) {
            searchInputs['search' + index] = $(this).val(); // Collect all search inputs
        });

        $.ajax({
            url: "<?= base_url('Clients/fetch_paginated_jobs') ?>",
            method: "GET",
            data: {
                status: tabType,
                page: page,
                limit: 20,
                ...searchInputs // spread search inputs into query
            },
            dataType: 'json',
            success: function (rdata) {
                let rows = '';
                if(rdata.length === 0){
                    rows = `<tr><td colspan="7">No data found</td></tr>`;
                } else {
                    rdata.jobs.forEach(job => {
                        rows += `
                            <tr>
                                <td>${job.jobcode}</td>
                                <td>${job.job_name}</td>
                                <td><span class='badge badge-success'>${job.status}</span></td>
                                <td>${job.sub_status}</td>
                                <td>${job.recieved_on}</td>
                                <td>${job.additional_comment}</td>
                                <td class="actions">
                                    <a href=""><i class="fa fa-search"></i></a>
                                    <a href=""><i class="fa fa-send"></i></a>
                                    <a href=""><i class="fa fa-folder-open"></i></a>
                                </td>
                            </tr>`;
                    });
                }

                $(`#tabContent-${tabType}`).html(rows);

                // Example pagination (you may build from backend response)
                $('.pagination').html(`
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                `);
            },
            error: function () {
                $(`#tabContent-${tabType}`).html("<tr><td colspan='7'>Error loading data</td></tr>");
            }
        });
    }

    // Initial Load
    loadJobs(currentTab, currentPage);

    // On Tab Click
    $('.nav-link').on('click', function () {
        const tabId = $(this).attr("id");
        const tabType = tabId.split('-')[1];
        loadJobs(tabType, 1);
    });

    // On Pagination Click
    $(document).on('click', '.pagination .page-link', function (e) {
        e.preventDefault();

        const $this = $(this);
        const page = parseInt($this.text());

        if (isNaN(page)) return;

        // Identify current tab by checking parent container
        const parentTab = $this.closest('.tab-pane').attr('id'); // like 'tabs-live', 'tabs-hold'

        // Derive tab key
        let tabKey = '';
        if (parentTab === 'tabs-live') tabKey = 'live';
        else if (parentTab === 'tabs-hold') tabKey = 'hold';
        else if (parentTab === 'tabs-completed') tabKey = 'completed';
        else if (parentTab === 'tabs-draft') tabKey = 'draft';

        // Call your loadJobs function with tab key and page
        if (tabKey) {
            loadJobs(tabKey, page);
        }
    });

    // On Search Input Change
    $(document).on('input', 'input.form-control', function () {
        loadJobs(currentTab, 1);
    });
});



 
</script>





<footer class="text-center py-3">
    <div class="container">
         &copy; 2025 Accurex Accounting | Powered by <a href="https://boffinweb.com" target="_blank">Boffin Web Technology</a>
    </div>
</footer>
<?php include('footer.php');?>
