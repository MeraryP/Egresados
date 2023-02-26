@extends('layouts.madre');

@section('title', 'Gráfico')

@section('content')
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

<div align="center">
<canvas id="myChart" style="width:650%;max-width:900px"></canvas>
</div>

<script>
var xValues = [
     @foreach ($graficos as $g)
     {{$g->año_egresado }},
     @endforeach];

var yValues = [
    @foreach ($graficos as $g)
    {{$g->cantidad }},
    @endforeach];


var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];


new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Egresados por año"
    }
  }
});
</script>

</body>
</html>

@stop


