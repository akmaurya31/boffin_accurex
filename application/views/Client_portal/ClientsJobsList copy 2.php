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

            <div class="tab-content" id="tabs-tabContent">
                <div class="tab-pane fade show active" id="tabs-live" role="tabpanel" aria-labelledby="tabs-live-tab">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 140px;">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" placeholder="Search">
                                    </th>
                                    <th style="width: 120px;">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </th>
                                    <th style="width: 120px;">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </th>
                                    <th style="width: 120px;">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" placeholder="Search">
                                    </th>
                                    <th style="width: 150px;"></th>
                                </tr>
                            </thead>
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
                            <tbody id="tabContent-live">
                                
                            </tbody>
                        </table>
                    </div>
                    <nav><ul id="pagination" class="pagination"></ul></nav>
                </div>


                <div class="tab-pane fade" id="tabs-hold" role="tabpanel" aria-labelledby="tabs-hold-tab">
                <table class="table"><tbody id="tabContent-hold"></tbody></table>
                 <!-- On Hold Job -->
                </div>

                <!-- <div class="tab-pane fade" id="tabs-hold"><table class="table"><tbody id="tabContent-hold"></tbody></table></div> -->
                
                <div class="tab-pane fade" id="tabs-completed" role="tabpanel" aria-labelledby="tabs-completed-tab">
                    <!-- Completed Job -->
                    <table class="table"><tbody id="tabContent-completed"></tbody></table>
                </div>
                <div class="tab-pane fade" id="tabs-draft" role="tabpanel" aria-labelledby="tabs-draft-tab">
                    <!-- Draft Job -->
                    <table class="table"><tbody id="tabContent-draft"></tbody></table>
                </div>
            </div>
        </div>
	</div>
	  


	<script>



$(document).ready(function () {
    function loadJobs(tabType) {
        alert("ASdfa");
        $.ajax({
            // url: `/get-jobs?status=${tabType}`, // Change this to your backend API
            url: "<?= base_url('Clients/fetch_completed_jobs_today') ?>",
            method: "GET",
            data: {
                status:${tabType}
                page: 10,
                limit: 20,
            },
            dataType: 'json',
            success: function (data) {
                let rows = '';
                data.forEach(job => {
                    rows += `
                        <tr>
                            <td>${job.code}</td>
                            <td>${job.name}</td>
                            <td>${job.status}</td>
                            <td>${job.subStatus}</td>
                            <td>${job.receivedOn}</td>
                            <td>${job.comments}</td>
                            <td><button class="btn btn-sm btn-primary">Edit</button></td>
                        </tr>`;
                });

                $(`#tabs-${tabType} #myjobList`).html(rows);
            },
            error: function () {
                $(`#tabs-${tabType}`).html("<p>Error loading data</p>");
            }
        });
    }

    // Initial load for Live Jobs
    loadJobs("live");

    // On tab click
    $('.nav-link').on('click', function (e) {
        let tabId = $(this).attr("id"); // e.g., tabs-live-tab
        let tabType = tabId.split('-')[1]; // get "live", "hold", etc.
        loadJobs(tabType);
    });
});














let currentPage = 1;
let searchTerm = '';

function loadJobs(page = 1, search = '') {
    $.ajax({
        url: "<?= base_url('Clients/fetch_paginated_jobs22') ?>",
        method: 'GET',
        data: { page: page, limit: 20, search: search },
        dataType: 'json',
        success: function (res) {
			console.log(res,"LLL152");
            let html = '';
            res.jobs.forEach(job => {
                html += `<tr><td>${job.job_code}</td><td>${job.job_name}</td></tr>`;
            });
            $('#jobTable tbody').html(html);

            const totalPages = Math.ceil(res.total / 20);
            renderPagination(totalPages, page);
        }
    });
}

function renderPagination(totalPages, currentPage) {
    let html = '';
    for (let i = 1; i <= totalPages; i++) {
        html += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#">${i}</a>
                 </li>`;
    }
    $('#pagination').html(html);
}

$(document).on('click', '#pagination .page-link', function (e) {
    e.preventDefault();
    currentPage = parseInt($(this).text());
    loadJobs(currentPage, searchTerm);
});

$('#searchInput').on('keyup', function () {
    searchTerm = $(this).val();
    loadJobs(1, searchTerm);
});

$(document).ready(function () {
    loadJobs();
});


	</script>


<script>
// let currentPage = 1;

function loadCompletedJobs(page = 1) {
    const jobCode = $('input[placeholder="Job Code"]').val();
    const jobName = $('input[placeholder="Job Name"]').val();

    $.ajax({
        url: "<?= base_url('Clients/fetch_completed_jobs_today11') ?>",
        type: 'GET',
        data: {
            page: page,
            limit: 20,
            job_code: jobCode,
            job_name: jobName
        },
        dataType: 'json',
        success: function(response) {
			console.log(response,"LLL212");
            let rows = '';
            response.jobs.forEach(job => {
                rows += `<tr><td>${job.job_code}</td><td>${job.job_name}</td></tr>`;
            });
            $('table tbody').html(rows);

            let totalPages = Math.ceil(response.total / 20);
            renderPagination(totalPages, page);
        }
    });
}

function renderPagination(totalPages, currentPage) {
    let html = '';
    for (let i = 1; i <= totalPages; i++) {
        html += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                   <a class="page-link" href="#">${i}</a>
                 </li>`;
    }
    $('#pagination').html(html);
}

$(document).on('click', '#pagination .page-link', function(e) {
    e.preventDefault();
    currentPage = parseInt($(this).text());
    loadCompletedJobs(currentPage);
});

$('input[placeholder="Job Code"], input[placeholder="Job Name"]').on('keyup', function() {
    loadCompletedJobs(1);
});

$(document).ready(function() {
    loadCompletedJobs();
});
</script>



<script>
//   let currentPage = 1;

  function loadJobs(page = 1) {
    const jobCode = $('#searchJobCode').val();
    const jobName = $('#searchJobName').val();

    $.ajax({
      url: "<?= base_url('Clients/fetch_paginated_jobs33') ?>",
      method: "GET",
      data: {
        page: page,
        limit: 20,
        search_code: jobCode,
        search_name: jobName
      },
      dataType: "json",
      success: function(response) {
		console.log(response,"LLL270");
        let rows = '';
        response.jobs.forEach(job => {
          rows += `<tr>
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
        $('#myjobList').html(rows);

        // Pagination
        const totalPages = Math.ceil(response.total / 20);
        let pagination = '';
        for (let i = 1; i <= totalPages; i++) {
          pagination += `<li class="page-item ${i === page ? 'active' : ''}">
            <a class="page-link" href="#">${i}</a>
          </li>`;
        }
        $('#pagination').html(pagination);
        currentPage = page;
      }
    });
  }

  // Pagination click
  $(document).on('click', '#pagination .page-link', function(e) {
    e.preventDefault();
    const page = parseInt($(this).text());
    if (!isNaN(page)) {
      loadJobs(page);
    }
  });

  // Search on typing (with delay)
  let searchTimer;
  $('#searchJobCode, #searchJobName').on('keyup', function() {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() => {
      loadJobs(1); // Search always loads from page 1
    }, 500);
  });

  // Load first page on ready
  $(document).ready(function() {
    loadJobs(1);
  });
</script>





<footer class="text-center py-3">
    <div class="container">
         &copy; 2025 Accurex Accounting | Powered by <a href="https://boffinweb.com" target="_blank">Boffin Web Technology</a>
    </div>
</footer>
<?php include('footer.php');?>
