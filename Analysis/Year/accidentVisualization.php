<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
       <!-- <link href="Highcharts/api/css/api.css" rel="stylesheet" type="text/css"/>  -->      
    </head>
    <body>
        <div class="container">      
          <h3 style='padding-left:20px;'><b>Graphical Representation of the Number of Accidents that occured in every county per year</b> </h3><br>

            <form name="searchForm"
                  id="searchForm"
                  class="form-horizontal"
                  type="post"
                >
                <select id="year" name='year'>
                <option selected="true" disabled="disabled">Select Year</option>

                </select>
            </form>
            <div id="chartsContainer">
                
            </div>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="jqueryui/jquery-ui.min.js"></script>
        <script src="js/highcharts.js"></script>
        <script src="js/highcharts-more.js"></script>
        <script src="js/exporting.js"></script>      
        <script src="js/accidentsData.js"></script>
         <script>
            var rqst = $.ajax({
                url:'route.php',
                data: {REQUEST_TYPE:'GET_YEARS'},
                type:'post',
                datatype:'json'                
            });
            
            rqst.done(function(srvResponse){
                var responseObj = $.parseJSON(srvResponse);
                for(var i = 0; i < responseObj.length; i++)
                {
                var min =responseObj[i]['minyear'];
                var max =new Date().getFullYear();
                select = document.getElementById('year');
                for (var i = min; i<=max; i++){
                var opt = document.createElement('option');
                opt.value = i;
                opt.innerHTML = i;
                select.appendChild(opt);
                }
                }
            });
        </script>
       
    </body>
</html>

