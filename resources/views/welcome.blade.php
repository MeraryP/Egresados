@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<body>
    <script src="{{ asset("JS/sweetalert2.all.min.js") }}"></script>
    <script src="{{ asset("JS/app.js") }}"></script>
    <script src="{{asset('JS/plotly-latest.min.js')}}"></script>
    <script src="{{asset('JS/chart.js')}}"></script>


    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <a href= "{{route('egresado.index')}}" style="text-decoration: none"> 
        <div class="card bg-gradient-info">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <h2 class="text-uppercase font-weight-bold text-default">
                              Egresados
                            </h2>
                            <h5 class="font-weight-bolder">
                              {{$totalegresado}} registrados
                            </h5>
                        </div>
                    </div>
                      <i class="fa fa-graduation-cap fa-4x" style="color:mediumslateblue"></i>
                </div>
            </div>
        </div>
      </a>
    </div>

    <br><br>

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
  xaxis: {range: [1976, (@if(isset($g->año_egresado)) {{$g->año_egresado}}+1 @else 2022 @endif)], title: "Año"},
  yaxis: {range: [1, (@if(isset($g->cantidad)) {{$g->cantidad}}+1 @else 10 @endif)], title: "Cantidad"},  
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



