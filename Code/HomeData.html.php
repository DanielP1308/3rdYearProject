<?php
   $path = "navPresetAdmin.php";
   include($path);

	if($_SESSION['user'] != "admin") {
		echo "	<script type='text/javascript'>alert('Only Admin is allowed to visit this page!');
						javascript:window.location.href = 'loginScreen.html.php' ;
				</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Usage</title>
<style type="text/css">
.BODY {
    width: 550PX;
}

#chart-container {
    width: 50%;
    height: 50%;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });
        
        function Last7Days () {
            var result = [];
            for (var i=0; i<7; i++) {
                var d = new Date();
                d.setDate(d.getDate() - i);
                result.push( formatDate(d) );
            }
            return result;
        }
        //https://stackoverflow.com/questions/23593052/format-javascript-date-as-yyyy-mm-dd
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            return [year, month, day].join('-');
        }
        
        function showGraph()
        {
            {
                $.ajax({
                    url: 'data.php', data: "", dataType: 'json',  success: function(data)        
                    {
                        var date = [];
                        var counter = 0;
                        var count = [];
                        var p = Last7Days();
                        var last7Days = [];
                        
                        for (var x in p) {
                            last7Days.push(p[x]);
                        }
                        last7Days.sort();
                        for (var i in last7Days)
                        {
                            var arrayDate = last7Days[i];
                
                            for (var y in data) {
                                var row = data[y];
                                var d = row.Date;
                                d = formatDate(d);
                                arrayDate = formatDate(arrayDate);
                                
                                if (arrayDate === d) {
                                    counter++;
                                }
                            }
                            count[i] = counter;
                            counter = 0;
                        }
                        var chartdata = {
                        labels: last7Days,
                        datasets: [
                                {
                                    label: 'Posts in Last Seven Days',
                                    backgroundColor: '#49e2ff',
                                    borderColor: '#46d5f1',
                                    hoverBackgroundColor: '#CCCCCC',
                                    hoverBorderColor: '#666666',
                                    data: count
                                }
                            ]
                        };

                        var graphTarget = $("#graphCanvas");

                        var barGraph = new Chart(graphTarget, {
                            type: 'bar',
                            data: chartdata
                        });
                    } 
                });
            }
        }
        </script>

</body>
</html>