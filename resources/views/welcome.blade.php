@extends('layouts.madre')

@section('title', 'Gráfico')

@section('content')

<!DOCTYPE html>
<html>
<body>

<div style= "width:23%; margin-right:1.5%; margin-top:4%">
<a href= "{{route('egresado.index')}}"> 
<div class="small-box bg-info">
<div class="inner">
<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$totalegresado}}</font></font></h3>
<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Egresados</font></font></p>
</div>
<div class="icon">
<i class="fa fa-graduation-cap"></i>
</div>
</div>
</a>
</div>



<div align ="center" id="myPlot" style="float:left; width:45%;max-width:700px"></div>
<div align ="center" style="float:right; width:45%;max-width:700px">
<canvas id="myChart" style="width:500%;max-width:800px; height:400px"></canvas>
</div>


<script>
 
var xArray = [
  @foreach ($graficos as $g)
     {{$g->año_egresado }},
     @endforeach
];
var yArray = [
  @foreach ($graficos as $g)
    {{$g->cantidad }},
    @endforeach
];

// Define Data
var data = [{
  x: xArray,
  y: yArray,
  mode:"lines"
}];

// Define Layout
var layout = {
  xaxis: {range: [1976, ( {{$g->año_egresado}} +1 )], title: "Año"},
  yaxis: {range: [1, ( {{$g->cantidad }} +2)], title: "Cantidad"},  
  title: "Egresados por año"
};


// Display using Plotly
Plotly.newPlot("myPlot", data, layout);

</script>







<script>
var xValues = [
     @foreach ($graficarrera as $g)
     '{{$g->carrera }}',
     @endforeach];

var yValues = [
    @foreach ($graficarrera as $g)
    '{{$g->cantidad }}',
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
    maintainAspectRatio: false,
    title: {
      display: true,
      text: "Carreras"
    }
  }
});
</script>

@stop



