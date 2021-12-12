
<script>
   var sCol = {
    chart: {
        height: 350,
        type: 'bar',
        toolbar: {
          show: false,
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Positive',
        data: [
            '{{  $positive[0] }}', '{{ $positive[1] }}', '{{  $positive[2] }}','{{  $positive[3] }}','{{  $positive[4] }}','{{  $positive[5] }}',
            '{{  $positive[6] }}', '{{  $positive[7] }}','{{  $positive[8] }}','{{  $positive[9] }}','{{  $positive[10] }}','{{  $positive[11] }}'
        ]
    }, {
        name: 'Negative',
        data: [
            '{{  $negative[0] }}', '{{ $negative[1] }}', '{{  $negative[2] }}','{{  $negative[3] }}','{{  $negative[4] }}','{{  $negative[5] }}',
            '{{  $negative[6] }}', '{{  $negative[7] }}','{{  $negative[8] }}','{{  $negative[9] }}','{{  $negative[10] }}','{{  $negative[11] }}'
        ]
    }],
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    },
    yaxis: {
        title: {
            text: ' (total)'
        }
    },
    fill: {
        opacity: 1

    },
    tooltip: {
        y: {
            formatter: function (val) {
                return  val
            }
        }
    }
}

var chart = new ApexCharts(
    document.querySelector("#lesson-chart"),
    sCol
);

chart.render();
</script>
