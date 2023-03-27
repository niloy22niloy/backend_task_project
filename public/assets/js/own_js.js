
//Select All Checkboxes
$(function() {
    //select all checkboxes
    $(".selectAll").click(function() { //"select all" change 
      $(".form-check-input").data('checked', !$(".form-check-input").data('checked')).prop('checked', $(".form-check-input").data('checked')); //change all ".checkbox" checked status
     
    });
  
    //".checkbox" change 
    $('.form-check-input').change(function() {
      //uncheck "select all", if one of the listed checkbox item is unchecked
      if (false == $(this).prop("checked")) { //if this item is unchecked
        $(".selectAll").prop('checked', false); //change "select all" checked status to false
      }
      //check "select all" if all checkbox items are checked
      if ($('.form-check-input:checked').length == $('.form-check-input').length) {
        $(".selectAll").html("uncheck all");
        $(".form-check-input").data('checked', true);
      }
      else {
      $(".selectAll").html("check all");
        $(".form-check-input").data('checked', false);
      }
    });
  });