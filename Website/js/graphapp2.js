$(document).ready(function(){
  showGraph2();
 });
   function showGraph2(){
     {
       $.post("getcarbonoutputtodistancedata.php",
       function (data)
       {
         var JSONdata = JSON.parse(data)
         console.log(JSONdata);
         var distance = [];
         var carbon_output = [];
 
         for(var i in JSONdata) {
           var curDist = JSONdata[i].distance;
           distance.push(curDist);
           carbon_output.push(JSONdata[i].carbon_output);
           
         }
         var chartdata = {
         labels: distance,
         datasets : [
           {
             borderColor: 'white',
             hoverBackgroundColor: 'white',
             hoverBorderColor: 'white',
             fontColor: 'white',
             data: carbon_output
           }
         ]
       };
 
       var ctx = $("#mycanvas2");
 
       var barGraph = new Chart(ctx, {
         type: 'line',
         data: chartdata,
         options: {
           title: {
             display: true,
             text: 'Your Carbon Output Compared To Distance Travelled',
             fontColor: 'white',
             fontSize: '20'
           },
           legend: {
             display: false
           },
           scales: {
             yAxes: [{
               scaleLabel: {
                 display: true,
                 labelString: 'Carbon Output (g)',
                 fontColor: 'white'
               },
               gridLines: {
                 zeroLineColor: 'white'
               },
               ticks: {
                 fontColor: 'white'
               }
             }],
             xAxes: [{
               scaleLabel: {
                 display: true,
                 labelString: 'Distance (Km)',
                 fontColor: 'white'
               },
               gridLines: {
                 zeroLineColor: 'white'
               },
               ticks: {
                 fontColor: 'white'
               }
             }]
             }
           }
           
         
       });
       });
     }
 
 }