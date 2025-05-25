@extends("layouts.admin")

@section("title")
Admin Panel - Početna
@endsection

@section("content")
<div class="container">
    <h1 class="mb-4">Administratorska kontrolna tabla</h1>

    <div class="row">
        <div class="col-md-6 mb-5">
            <h4>Statistika porudžbina</h4>
            <div id="orders_chart" style="height: 400px;"></div>
        </div>
        <div class="col-md-6 mb-5">
            <h4>Raspodela prihoda po kategorijama</h4>
            <div id="income_chart" style="height: 400px;"></div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-12">
            <h4>Kretanje korisnika</h4>
            <div id="users_chart" style="height: 400px;"></div>
        </div>
    </div>
</div>

{{-- Google Charts --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {'packages':['corechart', 'bar']});
google.charts.setOnLoadCallback(drawCharts);

function drawCharts() {
    // Pie Chart - Income by Category
    var incomeData = google.visualization.arrayToDataTable([
        ['Kategorija', 'Prihod'],
        ['Ribolovački štap Shimano FX', 50000],
        ['Mamac - veštačke gliste', 10000],
        ['Ribarska mreža standard', 15000],
        ['Kutija za pribor', 15000],
        ['Ribolovačka stolica na sklapanje', 38000]
    ]);

    var incomeOptions = {
        title: 'Raspodela prihoda po kategorijama (u RSD)',
        pieHole: 0.4,
        colors: ['#4285F4', '#EA4335', '#FBBC05', '#34A853', '#673AB7'],
        chartArea: {width: '90%', height: '80%'},
        legend: {position: 'labeled'}
    };

    var incomeChart = new google.visualization.PieChart(document.getElementById('income_chart'));
    incomeChart.draw(incomeData, incomeOptions);

    // Combo Chart - Orders Statistics
    var ordersData = google.visualization.arrayToDataTable([
        ['Mesec', 'Porudžbine', 'Povraćaj', 'Prosečna vrednost'],
        ['Jan', 120, 5, 12500],
        ['Feb', 145, 8, 11800],
        ['Mar', 98, 3, 13200],
        ['Apr', 113, 6, 14200],
        ['Maj', 125, 4, 15600],
        ['Jun', 138, 9, 14800]
    ]);

    var ordersOptions = {
        title: 'Statistika porudžbina po mesecima',
        seriesType: 'bars',
        series: {2: {type: 'line'}},
        colors: ['#4285F4', '#EA4335', '#34A853'],
        vAxis: {title: 'Količina'},
        hAxis: {title: 'Meseci'},
        legend: {position: 'top'},
        chartArea: {width: '85%', height: '70%'}
    };

    var ordersChart = new google.visualization.ComboChart(document.getElementById('orders_chart'));
    ordersChart.draw(ordersData, ordersOptions);

    // Area Chart - User Activity
    var usersData = google.visualization.arrayToDataTable([
        ['Dan', 'Novi korisnici', 'Aktivni korisnici'],
        ['1.', 10, 120],
        ['5.', 15, 145],
        ['10.', 8, 98],
        ['15.', 12, 113],
        ['20.', 18, 125],
        ['25.', 14, 138],
        ['30.', 20, 160]
    ]);

    var usersOptions = {
        title: 'Kretanje korisnika tokom meseca',
        colors: ['#FBBC05', '#34A853'],
        vAxis: {title: 'Broj korisnika'},
        hAxis: {title: 'Dani u mesecu'},
        legend: {position: 'top'},
        chartArea: {width: '85%', height: '70%'},
        isStacked: false
    };

    var usersChart = new google.visualization.AreaChart(document.getElementById('users_chart'));
    usersChart.draw(usersData, usersOptions);
}
</script>
@endsection