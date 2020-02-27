
<div>

</div>
<canvas
    id="chart"
    style="display: block; width: 762px; height: 300px;"
    width="762"
    height="300"
></canvas>


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
var positions=[];
var totals=[];
var chart_data= <?php echo json_encode($final_data["chart_data"]); ?>;
for(i=0;i<chart_data.length;i++){
  positions.push(chart_data[i]["position"]);
  totals.push(chart_data[i]["total"]);
}

    var config = {
        type: "doughnut",
        data: {
            datasets: [{
                data: totals,
                backgroundColor: [
                    "rgba(255, 99, 132, 0.8)",
                    "rgba(54, 162, 235, 0.8)",
                    "rgba(255, 206, 86, 0.8)",
                    "rgba(75, 192, 192, 0.8)",
                ],
            }],
            labels: positions,
        },
        options: {
            responsive: false,
            legend: {
                position: "bottom",
            },
            animation: {
                animateScale: false,
                animateRotate: false,
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById( "chart" ).getContext( "2d" );
        window.chart = new Chart( ctx, config );
    };
</script>
@endpush
