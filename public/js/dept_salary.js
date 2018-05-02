/**
 * Created by indira on 4/25/18.
 */
var ctx = document.getElementById('myChart').getContext('2d');
// var salaries = document.querySelector('#myChart').dataset.salaries;
var departments = document.querySelector('#myChart').dataset.departments;

departments = JSON.parse(departments);
var salaries = departments.map(function (item) { return item.dept_avg_salary; });
departments = departments.map(function (item) { return item.dept_name; });




// salaries = JSON.parse(salaries);
// salaries = salaries.map(function (item) { return item.avg_sal; });


var chart = new Chart(ctx, {

    type: 'bar',

    data: {
        labels: departments,
        datasets: [{
            label: "salary ",
            backgroundColor:[
                '#a29bfe',
                '#fd79a8',
                '#55efc4',
                '#f6e58d',
                '#74b9ff',
                '#EE5A24',
                '#6F1E51',
                '#05c46b',
                '#808e9b'
            ],
            data: salaries,
            hoverBorderWidth: 3,
            hoverBoxShadow: '#eeeeee'
        }]
    },

    options: {
        legend:false,
        title:{
            display:true,
            text:'Average salary in each department',
            fontColor: 'black',
            fontSize:18
        },
        layout:{
            padding:{
                left:50
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "black"
                }
            }],
            xAxes: [{
                ticks: {
                    fontColor: "black"
                }
            }]
        }
    }
});
