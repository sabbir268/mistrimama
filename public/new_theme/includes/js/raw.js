jQuery(document).ready(function() {
  // this is the id of the form
  jQuery(".first_step_form").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = jQuery(this);
    var url = form.attr("action");

    jQuery.ajax({
      type: "POST",
      url: url,
      data: form.serialize(), // serializes the form's elements.
      success: function(data) {
        jQuery(".first_step").css("display", "none");
        jQuery(".second_step").css("display", "block");
        data = JSON.parse(data);
        var sc = data.subCategories;

        var html = "";

        for (var i = 0; i < sc.length; i++) {
          html += '<div class="row" style="border-bottom: 2px solid #fff;margin-bottom: 12px">';
          html += '<div class="col-md-8">';
          html +=
            '<div style="cursor:pointer" class="row pt-0 pm-0" data-toggle="collapse" data-target="#collapsePanel' +
            sc[i].id +
            '" aria-expanded="false" aria-controls="collapseExample"> ';
          html +=
            '<h5 class="mb-0"> <span class=" rounded-circle "><i class="fa fa-chevron-down"></i></span>' +
            sc[i].name +
            "</h5> </div></div>";
          html += '<div class="col-md-4 text-center pt-2"> ';
          html +=
            '<span style="cursor :pointer" class="btn btn-sm btn-primary rounded addRemove" data-id="' +
            sc[i].id +
            '" id="addRemove' +
            sc[i].id +
            '">';
          html += "ADD</span> ";
          html +=
            '</div></div><div style="overflow: hidden;" class="row collapse mb-0 text-left" id="collapsePanel' +
            sc[i].id +
            '"> </div>';
        }
        jQuery(".show_subCategories").html(html);
      }
    });
  });

  jQuery(document).on("click", ".backToStepOne", function() {
    jQuery(".first_step").css("display", "block");
    jQuery(".second_step").css("display", "none");
  });

  jQuery(document).on("click", ".backToStepSecond", function() {
    jQuery(".second_step").css("display", "block");
    jQuery(".third_step").css("display", "none");
  });

  jQuery(document).on("click", ".forwardToThird", function() {
    jQuery(".third_step").css("display", "block");
    jQuery(".second_step").css("display", "none");
  });

  jQuery(document).on("click", ".addRemove", function() {
    var id = jQuery(this).data("id");
    jQuery.ajax({
      type: "POST",
      url: "/sub-services/add",
      headers: {
        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr("content")
      },
      data: {
        id: id
      }, // serializes the form's elements.
      success: function(data) {
        jQuery(".response_modal").html(data);
        jQuery("#exampleModal").modal("show");
      }
    });
  });

  

});
