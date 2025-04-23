<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
/**
 * Included in application/views/admin/clients/client.php
 */
?>
<script> 
$(function () {
  var vRules = {};

  if (typeof app !== 'undefined' && app.options.company_is_required == 1) {
    vRules = {
      company: 'required',
    };
  }

//   appValidateForm($('.client-form'), vRules);
  $('#ticket-reply').appFormValidator();

  $('.client-form').on('submit', function (e) {
    e.preventDefault(); // Stop normal submit

    var form = $(this);

    if (!form.valid()) {
      return;
    }

    // Optional: loader button text etc.
    var submitBtn = $('.customer-form-submiter');
    submitBtn.prop('disabled', true).text('Please wait...');

    $.ajax({
      url: form.attr('action'),
      method: form.attr('method'),
      data: form.serialize(),
      success: function (response) {
        // Handle success here
        console.log('Success:', response);

        // Optionally reload, redirect, or show success msg
        alert('Client Added Successfully!');
        form.trigger('reset');
      },
      error: function (xhr) {
        // Handle error here
        console.error('Error:', xhr.responseText);
        alert('Something went wrong. Please try again.');
      },
      complete: function () {
        submitBtn.prop('disabled', false).text('Preview');
      }
    });
  });
});


</script>