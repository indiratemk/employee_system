/**
 * Created by indira on 4/24/18.
 */
var searchButton = document.querySelector(".btn-search");
var searchForm = document.querySelector("#searchForm");

var deptButtons = document.querySelectorAll(".dept-button");

// var moreDetailsButton = document.querySelector(".more");

searchButton.addEventListener('click', searchEmployees);
for(var i = 0; i < deptButtons.length; i++) {
    deptButtons[i].addEventListener('click', showEmployees);
}
// moreDetailsButton.addEventListener('click', showSelectedEmployee);

// function showSelectedEmployee(event) {
//     event.preventDefault();
//     var id = event.target.dataset.id;
//     var xhr = new XMLHttpRequest();
//     xhr.open('GET', '/employee/' + id);
//     xhr.send();
//     xhr.onreadystatechange = function () {
//       if (xhr.readyState != 4) return;
//
//       if(xhr.status != 200) {
//           alert(xhr.status + ":" + xhr.responseText);
//       }
//       else {
//           Employees.innerHTML = xhr.response;
//       }
//     };
// }

function searchEmployees(event) {
    event.preventDefault();
    var formData = new FormData(searchForm);
    var searchInput = document.querySelector("#name").value;

    if (document.querySelector('.pagination')) {
        var pageButtons;
        initialize();

        function initialize(){
            pageButtons = document.querySelector('.pagination').children;
            for (i = 0; i < pageButtons.length; i++) {
                pageButtons[i].addEventListener('click', showPages);
            }
        }

        function showPages(event) {
            console.log(event.target);
            event.preventDefault();
            var url = event.target.getAttribute('href');
            console.log(url);
            getEmployees(url);
        }

        function getEmployees(url) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/search?name=' + searchInput + '&' + url.substring(27));
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.send();
            xhr.onreadystatechange = function () {
                if (xhr.readyState !== 4) return;
                if (xhr.status !== 200){
                    alert = xhr.status + ":" + xhr.responseText;
                }
                else{
                    Employees.innerHTML = xhr.response;
                    initialize();
                }
            }
        }
    }

    var xhr = new XMLHttpRequest();

    xhr.open('GET', '/search?name=' + searchInput);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.send(formData);

    xhr.onreadystatechange = function () {
        if(xhr.readyState !== 4) return;

        if(xhr.status !== 200) {
            alert(xhr.status + ': ' + xhr.statusText);
        }
        else{
            Employees.innerHTML = xhr.response;
            initialize();
        }
    };
}


function showEmployees(event) {
    event.preventDefault();
    var dept_no = event.target.dataset.department;
    initialize();
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/department/' + dept_no);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.send();
    console.log(dept_no);
    xhr.onreadystatechange = function () {
        if (xhr.readyState !== 4) return;
        if (xhr.status !== 200) {
            alert = xhr.status + ":" + xhr.responseText;
        }
        else {
            Employees.innerHTML = xhr.response;
            initialize();
        }
    }
}


if (document.querySelector('.pagination')) {
    var pageButtons;
    initialize();

    function initialize(){
        pageButtons = document.querySelector('.pagination').children;
        for (i = 0; i < pageButtons.length; i++) {
            pageButtons[i].addEventListener('click', showPages);
        }
    }

    function showPages(event) {
        console.log(event.target);
        event.preventDefault();
        var url = event.target.getAttribute('href');
        console.log(url);
        getEmployees(url);
    }

    function getEmployees(url) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState !== 4) return;
            if (xhr.status !== 200){
                alert = xhr.status + ":" + xhr.responseText;
            }
            else{
                Employees.innerHTML = xhr.response;
                initialize();
            }
        }
    }
}
