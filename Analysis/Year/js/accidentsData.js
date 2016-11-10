$(document).on('change', '#year', generateCharts);

function generateCharts()
{
    var year = $('#year').val();
    var data = {
        REQUEST_TYPE: 'GET_ACCIDENT_DATA',
        year: year
    };
    var srvRqst = $.ajax({
        url:'route.php',
        data: data,
        type:'post',
        datatype:'json'
    });
    
    srvRqst.done(function(srvResponse)
    {
        var responseObj = $.parseJSON(srvResponse);        
        
        var accidentsArr = [];
        for(var i = 0; i<responseObj.length; i++ )
        {
           accidentsArr.push([responseObj[i]['County'], parseInt(responseObj[i]['accidentCount'])]);
        }
        
        $('#chartsContainer').highcharts({
        chart: {
            spacingRight: 100,
                type: "column",
                width: 800,            },
        title: {
            text: 'Accidents in '+year+' County by Year'
        },
        subtitle: {
            text: ' '
        },
        xAxis: {
            type: 'category',
            title: {
                text: 'County Name'
            },
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            tickInterval: 1,
            title: {
                text: 'Accident Count'
            }
        },

        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Number of Accidents in '+year+'  county: <b>{point.y}</b>'
        },
plotOptions: {
            series: {
                pointWidth: 20
            }
        },
        

        series: [{
            name: 'Accidents',
            data: accidentsArr,
        colorByPoint: true,
         
    }]
    });
});
}