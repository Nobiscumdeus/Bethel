@extends('layout.bethel')
@section('title','Charts for Sunday')


@section('content')

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Welcome!</strong> Here you have the Charts and statistics for Sunday Attendance
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<div id="all">
<div class="chart-container total">
    <h3> Line Chart for Total Attendance </h3>
    <h5> Mean Attendance : <span id="TotalMean"></span></h5>

    <canvas id="lineChart" class="chart-canvas" width="100" height="100"></canvas>
</div>

<div class="chart-container">
    <h3> Bar Chart for Total Attendance </h3>
    <h5> Mean Attendance : <span id="TotalMeanBar"></span></h5>
    <canvas id="barChart" width="100" height="100"></canvas>
</div>

<!--- Attendane charts for others --->

<div class="chart-container men">
    <h3> Men Attendance Chart</h3>
    <h5> Mean Attendance : <span id="MenMean"></span></h5>
    <canvas id="lineChartMen" width="100" height="100"></canvas>
</div>
<div class="chart-container women">
    <h3> Women Attendance Chart</h3>
    <h5> Mean Attendance : <span id="WomenMean"></span></h5>
    <canvas id="lineChartWomen" width="100" height="100"></canvas>
</div>
<div class="chart-container children">
    <h3> Children Attendance Chart</h3>
    <h5> Mean Attendance : <span id="ChildrenMean"></span></h5>
    <canvas id="lineChartChildren" width="100" height="100"></canvas>
</div>
<div class="chart-container guests">
    <h3> Guests Attendance Chart</h3>
    <h5> Mean Attendance : <span id="GuestsMean"></span></h5>
    <canvas id="lineChartGuests" width="100" height="100"></canvas>
</div>
<div class="chart-container converts">
    <h3> Converts Attendance Chart</h3>
    <h5> Mean Attendance : <span id="ConvertsMean"></span></h5>
    <canvas id="lineChartConverts" width="100" height="100"></canvas>
</div>
</div>

 @endsection 
 <script>

fetch('/bethelattendance/sundaychart', {
    method: 'GET',
})
.then(response => response.json())
.then(data => {
    // Calculate the mean attendance for the "total" column
            const totalAttendance = data.reduce((total, attendance) => total + attendance.total, 0);
            const meanTotal = data.length > 0 ? Math.round(totalAttendance / data.length) : 0;
            const meanTotalElement = document.getElementById('TotalMean');
            meanTotalElement.textContent = ` ${meanTotal} persons`;

            //Mean calculation for men 
            const menAttendance = data.reduce((total, attendance) => total + attendance.men, 0);
            const menTotal = data.length > 0 ? Math.round(menAttendance / data.length) : 0;
            const menmeanTotalElement = document.getElementById('MenMean');
            menmeanTotalElement.textContent = ` ${menTotal} persons`;

            //Mean calculation for women 
            const womenAttendance = data.reduce((total, attendance) => total + attendance.women, 0);
            const womenTotal = data.length > 0 ? Math.round(womenAttendance / data.length) : 0;
            const womenmeanTotalElement = document.getElementById('WomenMean');
            womenmeanTotalElement.textContent = ` ${womenTotal} persons`;

            //Mean calculation for children 
            const childrenAttendance = data.reduce((total, attendance) => total + attendance.children, 0);
            const childrenTotal = data.length > 0 ? Math.round(childrenAttendance / data.length) : 0;
            const childrenmeanTotalElement = document.getElementById('ChildrenMean');
            childrenmeanTotalElement.textContent = ` ${childrenTotal} persons`;

            //Mean calculation for guests
            const guestsAttendance = data.reduce((total, attendance) => total + attendance.guests, 0);
            const guestsTotal = data.length > 0 ? Math.round(guestsAttendance / data.length) : 0;
            const guestsmeanTotalElement = document.getElementById('GuestsMean');
            guestsmeanTotalElement.textContent = ` ${guestsTotal} persons`;

            //Mean calculation for converts 
            const convertsAttendance = data.reduce((total, attendance) => total + attendance.converts, 0);
            const convertsTotal = data.length > 0 ? Math.round(convertsAttendance / data.length) : 0;
            const convertsmeanTotalElement = document.getElementById('ConvertsMean');
            convertsmeanTotalElement.textContent = ` ${convertsTotal} persons`;





            

    var barColors = [
    'rgba(75, 12, 192, 0.7)',
    'rgba(255, 99, 132, 0.8)',
    'rgba(54, 162, 235, 0.9)',
    'yellow',
    'green',
    'brown',
    'purple',
    // Add more colors as needed
];
    // Create the line chart
    var lineCtx = document.getElementById('lineChart').getContext('2d');
    
    var lineChart = new Chart(lineCtx, {
        type: 'line',
        data: {
           labels: data.map(entry => entry.date),
        
            datasets: [{
                label: 'General Attendance',
                data: data.map(entry => entry.total),
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
            }],
        },
        options: {
            scales: {
                x:{
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                
            },
        },
    });
    //Line Chart for men 
    var lineCtxMen = document.getElementById('lineChartMen').getContext('2d');
    var lineChartMen = new Chart(lineCtxMen, {
        type: 'line',
        data: {
            labels: data.map(entry => entry.date),
            datasets: [{
                label: 'Attendance for men ',
                data: data.map(entry => entry.men),
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
            }],
        },
        options: {
            scales: {
                x:{
                    ticks:{
                        font:{
                            size:20
                        },
                   //     color:'#fff'

                    }
                },
                y: {
                    beginAtZero: true,
                    ticks:{
                        font:{
                            size:20
                        },
                     //   color:'red'
                    }
                },
                
            },
        },
    });
    //Line Chart for Women
    var lineCtxWomen = document.getElementById('lineChartWomen').getContext('2d');
    var lineChartWomen = new Chart(lineCtxWomen, {
        type: 'line',
        data: {
            labels: data.map(entry => entry.date),
            datasets: [{
                label: 'Attendance for women ',
                data: data.map(entry => entry.women),
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
            }],
        },
        options: {
            scales: {
                x:{
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                
            },
        },
    });
     //Line Chart for Children
     var lineCtxChildren = document.getElementById('lineChartChildren').getContext('2d');
    var lineChartChildren = new Chart(lineCtxChildren, {
        type: 'line',
        data: {
            labels: data.map(entry => entry.date),
            datasets: [{
                label: 'Attendance for children ',
                data: data.map(entry => entry.children),
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
            }],
        },
        options: {
            scales: {
                x:{
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                
            },
        },
    });
//Line Chart for Guests
var lineCtxGuests = document.getElementById('lineChartGuests').getContext('2d');
    var lineChartGuests = new Chart(lineCtxGuests, {
        type: 'line',
        data: {
            labels: data.map(entry => entry.date),
            datasets: [{
                label: 'Attendance for guests ',
                data: data.map(entry => entry.guests),
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
            }],
        },
        options: {
            scales: {
                x:{
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                
            },
        },
    });
//Line Chart for Converts 
//Line Chart for Guests
var lineCtxConverts = document.getElementById('lineChartConverts').getContext('2d');
    var lineChartConverts = new Chart(lineCtxConverts, {
        type: 'line',
        data: {
            labels: data.map(entry => entry.date),
            datasets: [{
                label: 'Attendance for converts',
                data: data.map(entry => entry.converts),
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
            }],
        },
        options: {
            scales: {
                x:{
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                
            },
        },
    });


    // Create the bar chart
    var barCtx = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: data.map(entry => entry.date),
            datasets: [{
                label: 'Bar Chart for General Attendance',
                data: data.map(entry => entry.total),
                backgroundColor: barColors,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
            }],
        },
        options: {
            scales: {
                x:{
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks:{
                        font:{
                            size:20
                        }
                    }
                },
                
            },
        },
    });
})
.catch(error => {
    console.error('Error fetching data: ' + error);
});
</script> 
