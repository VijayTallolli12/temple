var kanike_monthly_details = document.getElementById("kanike_collected_details").value;
var seva_monthly_details = document.getElementById("seva_collected_details").value;
var data = kanike_monthly_details.split(',');
var data1 = seva_monthly_details.split(',');


var optionsProfileVisit = {
    annotations: {
        position: 'back'
    },
    dataLabels: {
        enabled: false
    },
    chart: {
        type: 'bar',
        height: 300
    },
    fill: {
        opacity: 1
    },
    plotOptions: {},
    series: [{
        name: 'Kanike',
        data: data
    }],
    colors: '#435ebe',
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    },
}

var optionsProfileVisit2 = {
    annotations: {
        position: 'back'
    },
    dataLabels: {
        enabled: false
    },
    chart: {
        type: 'bar',
        height: 300
    },
    fill: {
        opacity: 1
    },
    plotOptions: {},
    series: [{
        name: 'Seva',
        data: data1
    }],
    colors: '#435ebe',
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    },
}

var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
var chartProfileVisit1 = new ApexCharts(document.querySelector("#chart-profile-visit1"), optionsProfileVisit2);

chartProfileVisit.render();
chartProfileVisit1.render();