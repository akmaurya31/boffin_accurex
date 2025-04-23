<?php include('header.php');?>
<?php
	date_default_timezone_set('Europe/London');
	$current_date =  date('d-m-Y'); // Example output: 16-04-2025
?>
<style>
    thead.thead-dark-blue th {
        background-color: #14264d;
        color: #fff;
        border-color: #14264d;
        padding: 8px 15px;
            text-wrap-mode: nowrap;
    }
    tbody tr td{
    }
    input[type=checkbox], input[type=radio] {
        height: 15px!important;
        width: 15px;
    }
    .table .form-control {
        height: 30px;
        line-height: 30px;
    }
    #p-15 {
        margin: 0px;
        padding: 15px 0px;
    }
    footer {
        background: #ffffff;
        margin-top: 50px;
    }
    .section-header2{
        color: #14264d;
        padding: 10px 20px;
        font-weight: bold;
        font-size: 20px;
    }
    h5.table_middle_heading {
        color: #f55e1d;
        font-size: 18px;
        font-weight: 600;
    }
    #other_show{
        margin-top: 60px;
    }

	.toast-msg {
  display: none;
  position: fixed;
  top: 20px;
  right: -300px;
  background-color: #28a745;
  color: white;
  padding: 15px 25px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  z-index: 9999;
  font-size: 16px;
  transition: right 0.5s ease-in-out;
}
.toast-msg.show {
  display: block;
  right: 20px;
}


</style>

<?php include('navigation.php');?>
<div class="page-content">
  <!-- Breadcrumb -->
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New Job </li>
    </ol>
  </div>
   <!-- Dashboard Header -->
   <div id="toast" class="toast-msg">Form submitted successfully!</div>
	<?php //echo $this->uri->uri_string(); die("asdfasdf"); ?>
   <?= form_open($this->uri->uri_string(), ['class' => 'client-form', 'autocomplete' => 'off','id'=>'jobForm']); ?>
		<div class="container">
			<div class="dashboard-tab-wrapper mb-3">
			<div class="dashboard-tab">NEW JOB</div>
			<div class="dashboard-line"></div>
			</div>
			<div class="row mt-3 bg-white" id="p-15">
			<!-- Completed Jobs -->
				<div class="col-md-5 bg-white">
					<div class="section-header2">New Job Details</div>
				<div class="box">
					<div class="form-group">
						<label>Assignment Type <span>*</span></label>
						<select class="form-control" placeholder="Job Code" id="job_code" name="assignment_type">
							<option value="">Select Type of Assignment</option>
							<option value="year_end_account">Year End Account</option>
							<option value="bookkeeping">Bookkeeping / VAT</option>
							<option value="personal_tax_return">Personal Tax Return</option>
							<option value="other">Other</option>
						</select>
						<span class="error-msg"></span>
					</div>
					<div class="form-group">
						<label>Name of Client <span>*</span></label>
						<input type="text" class="form-control" name="client_name">
						<span class="error-msg"></span>
					</div>
					<div class="form-group">
						<label>Contact Person <span>*</span></label>
						<input type="text" class="form-control" name="contact_person">
						<span class="error-msg"></span>
					</div>
					<div class="form-group">
						<label>Email Address <span>*</span></label>
						<input type="email" class="form-control" name="email_address">
						<span class="error-msg"></span>
					</div>
					<div class="form-group" id="tax_year">
						<label>Tax Year <span>*</span></label>
						<select class="form-control" name="tax_year_end">
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
						</select>
						<span class="error-msg"></span>

					</div>
					<div class="form-group" name="year_end" id="year_end" style="display:none">
						<label>Year End <span>*</span></label>
						<select class="form-control" name="year_end">
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
						</select>
						<span class="error-msg"></span>

					</div>
					<div class="form-group" id="bookkepping_tax_year" style="display:none">
						<label>Quarter/Period <span>*</span></label>
						<select class="form-control" name="qtr_year_end">
								<option value="">Select Month</option>
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
						</select>
						<span class="error-msg"></span>

					</div>
					<div class="form-group" id="budget_year">
						<label>Budgeted Hours</label>
						<input type="text" class="form-control" name="budgeted_hours">
					</div>
					<div class="form-group" id="accountancy_fee">
						<label>Accountancy Fee(Net) <span>*</span></label>
						<input type="text" class="form-control" name="accountancy_fee_net">
						<span class="error-msg"></span>

					</div>
					<div class="form-group">
						<label>Select Attachments <span></span></label>
						<input type="file" class="form-control" name="attachement[]">
						<span style="font-size: 13px; color: #f65d1f;">Total attachement size upto 100 MB</span>
					</div>
					<div class="form-group" id="additiona_comment">
						<label>Additional Comment <span></span></label>
						<textarea class="form-control" name="additional_comment" rows="6"></textarea>
						<span class="error-msg"></span>

					</div>
					</div>
				</div>
				<div class="col-md-7 bg-white">
					<div class="table-responsive" style="display:none" id="personal_tax_return_show">
					<table class="table table-bordered">
						<thead class="thead-dark-blue">
							<th>Sr No.</th>
							<th>Description</th>
							<th>Yes</th>
							<th>Comments</th>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<th>Source of Income</th>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>2</td>
								<td>Employment</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Pension Income</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Self Employment</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>5</td>
								<td>UK Property</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>6</td>
								<td>Partnership</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>7</td>
								<td>Interest Income</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>8</td>
								<td>Divided Income</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>9</td>
								<td>Foreign Income</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>10</td>
								<td>Capital Gain</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>11</td>
								<td>Any Other Income</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>12</td>
								<td>Last Year Tax return</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>13</td>
								<td>Payment On Account</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>14</td>
								<td>Any Other Info</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
						</tbody>
					</table>
					</div>
					<div class="table-responsive" style="display:none" id="bookkeeping_show">
						<table class="table table-bordered">
							<thead class="thead-dark-blue">
								<th>Sr No.</th>
								<th>Description</th>
								<th>Yes</th>
								<th>Comments</th>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Nature of Business</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>2</td>
									<td>VAT Scheme (Cash/Standard/Flat rate/Margin)</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>3</td>
									<td>Previous VAT Returns</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>4</td>
									<td>Bank account statements (all business accounts)</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>5</td>
									<td>Credit card statements (all business credit cards)</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>6</td>
									<td>HP/Loan statements (if applicable)</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>7</td>
									<td>Accounting software (Sage, QuickBooks, Xero)</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>8</td>
									<td>Copies of sales invoices issued</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>9</td>
									<td>Receipts for business expenses</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>10</td>
									<td>Access to POS system reports (if applicable)</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>11</td>
									<td>Expense reimbursement details e.g., mileage logs</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>12</td>
									<td>Payroll Reports (Payroll Summary, P32 report)</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td>13</td>
									<td>Cash expenses report</td>
									<td><input type="checkbox" name="employment" class="form-control"></td>
									<td>
										<input type="text" name="employment_text" class="form-control">
									</td>
								</tr>
								
							</tbody>
						</table>
					</div>
					<div class="table-responsive" style="display:none" id="other_show">
						<div class="form-group" id="additiona_comment">
							<label>Additional Comment <span>*</span></label>
							<textarea class="form-control" name="additiona_comment" rows="8"></textarea>
						</div>
					</div>
					<div class="table-responsive" style="display:none" id="year_end_account_show">
					<table class="table table-bordered">
						<thead class="thead-dark-blue">
							<th>Sr No.</th>
							<th>Description</th>
							<th>Yes</th>
							<th>Comments</th>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Nature of Business <span>*</span></td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td><input type="text" name="employment_text" class="form-control"></td>
							</tr>
							
							<tr>
								<td colspan="4">
									<h5 class="table_middle_heading">Records </h5>
								</td>
							</tr>
							<tr>
								<td></td>
								<th>Documents</th>
								<td></td>
								<td></td>
							</tr>
							<tr>
							<tr>
								<td>2</td>
								<td>Previous year Final account and Trial balance</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Previous year working paper</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Sales details</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Purchase / expenses details</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>6</td>
								<td>Bank account statements</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>7</td>
								<td>Credit card statement</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>8</td>
								<td>Loan / HP statements</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>9</td>
								<td>Payroll / CIS records</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>10</td>
								<td>Expenses re-imbursement details</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>11</td>
								<td>Client cashbook</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>12</td>
								<td>Others</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>13</td>
								<td> Any key events in the year</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>14</td>
								<td> Closing stock value</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<h5 class="table_middle_heading">VAT</h5>
								</td>
							</tr>
							<tr>
								<td>15</td>
								<td>VAT Scheme</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>16</td>
								<td>VAT Computation Method</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
							<tr>
								<td>17</td>
								<td>VAT Returns and Working</td>
								<td><input type="checkbox" name="employment" class="form-control"></td>
								<td>
									<input type="text" name="employment_text" class="form-control">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-12 text-center mb-3">
				<button    class="btn btn-purple customer-form-submiter">Preview</button>
				<button  class="btn dismiss">Close</button>
			</div>
		</div>
	<?= form_close(); ?>
	<div id="loader"></div>
	<div id="successMessage">Thank you! Your form has been successfully submitted.</div>
		<!-- Error Message -->
	<div id="errorMessage">Something went wrong! Please try again later.</div>

	<div id="loader" style="display:none;">Submitting...</div>
<div id="responseMsg" style="display:none;"></div>


</div>						

<footer class="text-center py-3">
    <div class="container">
         &copy; 2025 Accurex Accounting | Powered by <a href="https://boffinweb.com" target="_blank">Boffin Web Technology</a>
    </div>
</footer>
<?php include('footer.php');?>
<script>
    $(document).ready(function () {
        $('#job_code').on('change', function () {
            if ($(this).val() === 'personal_tax_return') {
                $('#personal_tax_return_show').fadeIn();
                $('#bookkepping_tax_year').hide();
                $('#tax_year').show();
                $('#additiona_comment').show();
                $('#year_end').hide();
                
            } else {
                $('#personal_tax_return_show').fadeOut();
            }
            
            if ($(this).val() === 'year_end_account') {
                $('#year_end_account_show').fadeIn();
                $('#bookkepping_tax_year').hide();
                $('#tax_year').hide();
                $('#additiona_comment').show();
                $('#year_end').show();
            } else {
                $('#year_end_account_show').fadeOut();
            }
            
            if ($(this).val() === 'bookkeeping') {
                $('#bookkeeping_show').fadeIn();
                $('#tax_year').hide();
                $('#bookkepping_tax_year').show();
                $('#additiona_comment').show();
                $('#year_end').hide();
            } else {
                $('#bookkeeping_show').fadeOut();
            }
            
            if ($(this).val() === 'other') {
                $('#other_show').fadeIn();
                $('#tax_year').hide();
                $('#bookkepping_tax_year').hide();
                $('#accountancy_fee').hide();
                $('#additiona_comment').hide();
                $('#year_end').hide();
            } else {
                $('#other_show').fadeOut();
            }
        });
    });
    
    
    // $(document).ready(function () {
    //     $('#job_code').on('change', function () {
    //         if ($(this).val() === 'year_end_account') {
    //             $('#personal_tax_return_show').fadeIn();
    //         } else {
    //             $('#personal_tax_return_show').fadeOut();
    //         }
    //     });
    // });
    
    // 
</script> 


<script>
	function validateRequiredField(selector, message) {
    $(selector).on('blur', function () {
        const $this = $(this);
        if ($this.val().trim() === "") {
            $this.css("border", "1px solid red");
            $this.closest('div').find('.error-msg').html(message).css("color", "red").show();
        } else {
            $this.css("border", "");
            $this.closest('div').find('.error-msg').html("").hide();
        }
    });
}

function showToast(message) {
    $('#toast').text(message).addClass('show');

    setTimeout(function () {
        $('#toast').removeClass('show');
    }, 3000); // Hide after 3 seconds
}

        $(document).ready(function(){
            $("#jobForm").submit(function(e){
                e.preventDefault(); // Prevent default form submission

				 // Client-side validation
				 let isValid = true;
    			 let errorMsg = "";	

				// Field-wise validation
			 

				$('span.error-msg').html('').hide();

								
				validateRequiredField('[name="client_name"]', "Client name is required");
				validateRequiredField('[name="assignment_type"]', "Please select assignment type");
				validateRequiredField('[name="email_address"]', "Email is required");
				validateRequiredField('[name="qtr_year_end"]', "Please select quarter year end");
				validateRequiredField('[name="accountancy_fee_net"]', "Accountancy fee is required");

				if ($('[name="assignment_type"]').val().trim() === "") {
					isValid = false;
					$('[name="assignment_type"]').css("border", "1px solid red");
					$('[name="assignment_type"]').closest('div').find('.error-msg').html("Please select assignment type").css("color", "red").show();
				} else {
					$('[name="assignment_type"]').css("border", "");
					$('[name="assignment_type"]').closest('div').find('.error-msg').html("").hide();
				}


				// Client Name validation
if ($('[name="client_name"]').val().trim() === "") {
    isValid = false;
    $('[name="client_name"]').css("border", "1px solid red");
    $('[name="client_name"]').closest('div').find('.error-msg').html("Client name is required").css("color", "red").show();
    alert("ss4s");
} else {
    $('[name="client_name"]').css("border", "");
    $('[name="client_name"]').closest('div').find('.error-msg').html("").hide();
}

				// Contact Person validation
				if ($('[name="contact_person"]').val().trim() === "") {
					isValid = false;
					$('[name="contact_person"]').css("border", "1px solid red");
					$('[name="contact_person"]').closest('div').find('.error-msg').html("Contact person is required").css("color", "red").show();
				} else {
					$('[name="contact_person"]').css("border", "");
					$('[name="contact_person"]').closest('div').find('.error-msg').html("").hide();
				}

				// Email validation
				if ($('[name="email_address"]').val().trim() === "") {
				isValid = false;
				$('[name="email_address"]').css("border", "1px solid red");
				$('[name="email_address"]').closest('div').find('.error-msg').html("Email is required").css("color", "red").show();
				} else {
				$('[name="email_address"]').css("border", "");
				}


				// Quarter Year End validation
if ($('[name="qtr_year_end"]').val().trim() === "") {
    isValid = false;
    $('[name="qtr_year_end"]').css("border", "1px solid red");
    $('[name="qtr_year_end"]').closest('div').find('.error-msg').html("Please select quarter year end").css("color", "red").show();
    // alert("qtr_year_end required");
} else {
    $('[name="qtr_year_end"]').css("border", "");
    $('[name="qtr_year_end"]').closest('div').find('.error-msg').html("").hide();
}


// Accountancy Fee validation
if ($('[name="accountancy_fee_net"]').val().trim() === "") {
    isValid = false;
    $('[name="accountancy_fee_net"]').css("border", "1px solid red");
    $('[name="accountancy_fee_net"]').closest('div').find('.error-msg').html("Accountancy fee is required").css("color", "red").show();
    // alert("accountancy_fee_net required");
} else {
    $('[name="accountancy_fee_net"]').css("border", "");
    $('[name="accountancy_fee_net"]').closest('div').find('.error-msg').html("").hide();
}

				// if (!isValid) {
				// 	alert("sdasd");
				// //	$('[name="email_address"]').next('span').html(errorMsg).css("color", "red").show();
				// 	return;
				// }





	$("#loader").show();
    $("#responseMsg").hide();




                // Clear previous messages
                $("#successMessage").hide();
                $("#errorMessage").hide();


				//user_id	jobcode	assignment_type	client_name	contact_person	email_address	year_end	budgeted_hours	accountancy_fee_net	additional_comment	created_at	updated_at
				

                // Client-side Validation
                // var username = $("#username").val();
                // var email = $("#email").val();
                // var password = $("#password").val();

                // if(username == "" || email == "" || password == ""){
                //     alert("All fields are required!");
                //     return false; // Stop form submission
                // }

                // Show loader
                $("#loader").show();

                // Prepare data to send to server
                // var formData = {
                //     username: username,
                //     email: email,
                //     password: password
                // };

                // Send data to server using AJAX
                $.ajax({
					url: "<?= base_url('Clients/ClientsAddNewJobs_POST') ?>",
                    type: 'POST',
                    data: $("#jobForm").serialize(),
					dataType: "json",
                    success: function(response){
                        // Hide loader
                        $("#loader").hide();

                        // Check server-side validation response
                        if(response == "success"){
                            // Show success message
							showToast("✅ Thank you! Form submitted successfully.");
							$("#responseMsg").html("Thank you! Job successfully added.").css("color", "green").show();
         					$("#jobForm")[0].reset();

                          //  $("#successMessage").show();
                        } else {
                            // Show error message
                           // $("#errorMessage").show();
						   $("#responseMsg").html("Server Error: " + response.message).css("color", "red").show();
                        }
                    },
                    error: function(){
                        // Hide loader and show error message if AJAX fails
						showToast("❌ Something went wrong. Please try again.");
                        $("#loader").hide();
                        // $("#errorMessage").show();
						$("#responseMsg").html("Something went wrong. Try again.").css("color", "red").show();
                    }
                });
            });
        });



    </script>
