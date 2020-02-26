$(function() {
          $(".autocomplete1").autocomplete({
            source: function(request, response) {
              // Fetch data
              $.ajax({
                url: "api.php",
                type: 'post',
                dataType: "json",
                data: {
                  search: request.term
                },
                success: function(data) {
                  response(data);
                }
              });
            },
            select: function(event, ui) {
              // Set selection
              $('.autocomplete1').val(ui.item.label); // display the selected text
              
              return false;
            },
            position: {
              my: "centre top",
              at: "centre bottom",
              of: ".autocomplete1",
              collision: "none"
              
            }
          });
          $(".autocomplete2").autocomplete({
            source: function(request, response) {
              // Fetch data
              $.ajax({
                url: "api.php",
                type: 'post',
                dataType: "json",
                data: {
                  search: request.term
                },
                success: function(data) {
                  response(data);
                }
              });
            },
            select: function(event, ui) {
              // Set selection
              $('.autocomplete2').val(ui.item.label); // display the selected text
              
              return false;
            }
          });
        });