/**
* @package Graph
* @author Babajide Ibiayo
* @author_email babajideibiayo@yahoo.com
* @version 1.0
*
* This script provides custom extensions and graphing functions for the iniLibs School Apps using Chart.js

**/



function displayAttendancePieGraph(data, id, options=null){

 /* Function display Pie Chart using Chart.js 
  * @Params type String Chartype takes value of "Pie" or "Doughnut"
  * @params data object literal or array
  * @params id String Html id of canvas element
  * @params options array Chart.js options
  */

    var ctx = $(id).get(0).getContext("2d");
    new Chart(ctx).Pie(data);
  }

  function displayAttendanceDoughnutGraph(data, id, options=null) {

 /* Function display Pie Chart using Chart.js 
  * @Params type String Chartype takes value of "Pie" or "Doughnut"
  * @params data object literal or array
  * @params id String Html id of canvas element
  * @params options array Chart.js options
  */

    var ctx = $(id).get(0).getContext("2d");

    if(ctx){ // Check if we have a valid canvas context
      var myChart = new Chart(ctx).Doughnut(data, options);

      if(myChart){ // Check if we have a chart object
        myLegend = myChart.generateLegend();
        $('div#js-legend').html(myLegend);
        return true;
      } else{
        return false;
      }

    } else {
      return false;
    }
    
  }