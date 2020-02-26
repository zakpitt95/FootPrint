$(document).ready(function(){
 showGraph();
});
  function showGraph(){
    {
      $.post("getcarbonoutputdata.php",
      function (data)
      {
        var JSONdata = JSON.parse(data)
        console.log(JSONdata);
        var date = [];
        var carbon_output = [];

        for(var i in JSONdata) {
          var curDate = JSONdata[i].date;
          date.push(curDate);
          carbon_output.push(JSONdata[i].carbon_output);
          
        }
        console.log(date);
        console.log(carbon_output);
        var chartdata = {
        labels: date,
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

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata,
        options: {
          title: {
            display: true,
            text: 'Your Carbon Output For This Month',
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
                labelString: 'Date',
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