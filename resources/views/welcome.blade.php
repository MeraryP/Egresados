@extends('layouts.madre')

@section('title', 'Gráfico')

@section('content')

<!DOCTYPE html>
<html>
<body>
<div align="center">
<div id="myPlot" style="width:100%;max-width:700px"></div>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
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
  xaxis: {range: [2015, 2030], title: "Año"},
  yaxis: {range: [1, 16], title: "Cantidad"},  
  title: "Egresados por año"
};

// Display using Plotly
Plotly.newPlot("myPlot", data, layout);
</script>

</body>
</html>
@stop



