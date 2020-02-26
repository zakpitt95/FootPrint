//Define template
var template = $('#sections .section:first').clone();

//Define counter
var sectionsCount = 1;

//Options for autocomplete
var options1 = {
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
        $('.autocomplete3').val(ui.item.label); // display the selected text
        return false;
      }
}
var options2 = {
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
        $('.autocomplete4').val(ui.item.label); // display the selected text
        return false;
      }
}
var options3 = {
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
        $('.autocomplete5').val(ui.item.label); // display the selected text
        return false;
      }
}
var options4 = {
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
        $('.autocomplete6').val(ui.item.label); // display the selected text
        return false;
      }
}

var origin = 'origin1';
var destination = 'destination1';
var vehicle = 'vehicle1';

//Add new section
$('body').on('click', '.addsection', function() {

    //Increment
    if(sectionsCount < 3){
    sectionsCount++;

    //Input Loop
    var section = template.clone().find(':input').each(function(){

        //set id to store the updated section number
        var newId = this.id + sectionsCount;
        var currentName = this.getAttribute('name');
        var origin2 = 'origin2';
        var destination2 = 'destination2';
        var vehicle2= 'vehicle2';

        //Attributes for 2nd section
        if(sectionsCount == 2){
            if(origin == currentName){
                this.setAttribute('name', 'origin2');
                this.className = 'autocomplete3';
            }
            if(destination == currentName){
                this.setAttribute('name', 'destination2');
                this.className = 'autocomplete4';
            }
            if(vehicle == currentName){
                this.setAttribute('name', 'vehicle2');
            }
        }
        //Attributes for 3rd Section
        if(sectionsCount == 3){
            if(origin == currentName){
                this.setAttribute('name', 'origin3');
                this.className = 'autocomplete5';
                
            }
            if(destination == currentName){
                this.setAttribute('name', 'destination3');
                this.className = 'autocomplete6';
                
            }
            if(vehicle == currentName){
                this.setAttribute('name', 'vehicle3');
            }
        }
        


        //Update label
		$(this).prev().attr('for', newId);
        

        //Update ID
        this.id = newId;
        
    }).end()
    
    //inject new section
    .appendTo('#sections')
    //Add autocomplete to new inputs
    $('.autocomplete3').autocomplete(options1);
    $('.autocomplete4').autocomplete(options2);
    $('.autocomplete5').autocomplete(options3);
    $('.autocomplete6').autocomplete(options4);
    
    
    return false;
    
}
});

//Remove section
$('#sections').on('click', '.remove', function() {
    //fade out section
    if(sectionsCount > 1){
    $(this).parent().fadeOut(300, function(){
        sectionsCount--;
        return false;
    });
    }
    return false;
});