/**
 * Created by indira on 4/26/18.
 */
var ctx = document.querySelector('#titles').getContext('2d');
var salaries = document.querySelector('#titles').dataset.salaries;
var titles = document.querySelector('#titles').dataset.titles;

titles = JSON.parse(titles);
titles = titles.map(function (item) { return item.title; });

salaries = JSON.parse(salaries);
salaries = salaries.map(function (item) { return item.high_sal; });


var chart = new Chart(ctx, {

    type: 'bar',

    data: {
        labels: titles,
        datasets: [{
            label: "salary ",
            backgroundColor:[
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
        legend: false,
        title: {
            display: true,
            text: 'The highest salary for every title',
            fontColor: 'black',
            fontSize: 18
        },
        layout: {
            padding: {
                left: 50
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
