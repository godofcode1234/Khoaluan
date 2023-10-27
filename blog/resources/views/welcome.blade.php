<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no" />
    <title>FeatureTable with popup interaction | Sample | ArcGIS Maps SDK for JavaScript 4.27</title>

    <link rel="stylesheet" href="https://js.arcgis.com/4.27/esri/themes/light/main.css" />
    <script src="https://js.arcgis.com/4.27/"></script>
  </head>
<style>
    
  html,
    body {
      height: 100%;
      width: 100%;
      margin: 0;
      padding: 0;
    }

    .esri-popup--is-docked-top-right .esri-popup__main-container {
      max-height: 100%;
    }

    #appContainer {
      display: flex;
      flex-direction: column;
      height: 100%;
      width: 100%;
    }

    #viewDiv {
      flex: 1;
      width: 100%;
    }

    .container {
      display: flex;
      flex: 1;
      width: 100%;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 45px;
      height: 22px;
      vertical-align: middle;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: 0.4s;
      transition: 0.4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 20px;
      width: 20px;
      left: 3px;
      bottom: 1px;
      background-color: white;
      -webkit-transition: 0.4s;
      transition: 0.4s;
    }

    input:checked + .slider {
      background-color: #2196f3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196f3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(20px);
      -ms-transform: translateX(20px);
      transform: translateX(20px);
    }

    /* Rounded sliders */

    .slider.round {
      border-radius: 20px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    .labelText {
      padding-left: 5px;
      font-size: 15px;
    }

    #mainDiv {
      padding: 8px;
    }
  
</style>
<script src="{{ asset('map.js') }}">
  
  </script>
  <head >
    <label id="coorhead"></label>
  </head>

<body>
 
  <div id="appContainer">
    <div id="viewDiv"></div>
    <label  id="coordinatelabel">fhwuiegh</label>
    <form action="{{ route('insert') }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
      <div class="form-group">
          <label for="shape">Shape</label>
          <textarea name="shape" id="shape" cols="30" rows="10"></textarea>
      </div>
  
      <button type="submit">Lưu</button>
  </form>
    <div id="tableContainer" class="container">
      <div id="tableDiv"></div>
    </div>
    <div id="mainDiv" class="esri-widget">
      <label class="switch">
        <input id="checkboxId" type="checkbox" checked="yes" />
        <span class="slider round"></span>
      </label>
      <label class="labelText" id="labelText">Hide feature table</label>
    </div>
  </div>

    
  </div>

</body>
</html>
{{-- <script>
var polygons = [];
@foreach ($polygonCoordinates as $polygon);
var coordinates = {{ $polygon}};
        polygons.push(coordinates);
@endforeach
</script> --}}
