/**
 * Created by indira on 4/26/18.
 */
    var selection = document.querySelector('#selection');
    selection.addEventListener('change', setOption);
    console.log(selection.options);

    function initializeGraph() {
        var ctx = document.querySelector('#fluidity').getContext('2d');
        var years = document.querySelector('#fluidity').dataset.years;
        var fluidity = document.querySelector('#fluidity').dataset.fluidity;

        var chart = new Chart(ctx, {

            type: 'line',

            data: {
                labels: JSON.parse(years),
                datasets: [{
                    label: "fluidity ",
                    data: JSON.parse(fluidity),
                    borderWidth: 3,
                    borderColor: "red",
                    backgroundColor: 'transparent'
                }]
            },

            options: {
                legend: false,
                title: {
                    display: true,
                    text: 'Fluidity on 1997-2002',
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

    }

    initializeGraph();

    function setOption(event) {
        event.preventDefault();
        var dept_no = event.target.options[selection.selectedIndex].dataset.dept;

        console.log(dept_no);

        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/fluidity/' + dept_no);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState !== 4) return;
            if (xhr.status !== 200) {
                alert = xhr.status + ":" + xhr.responseText;
            }
            else {
                graphBlock.innerHTML = xhr.response;
                initializeGraph();
            }
        }
    }




