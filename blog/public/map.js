require([
"esri/Map",
"esri/views/MapView",
"esri/widgets/Sketch",
"esri/layers/GraphicsLayer",
"esri/Graphic",
"esri/views/draw/Draw",
"esri/layers/MapImageLayer",
"esri/layers/FeatureLayer",
"esri/widgets/FeatureTable",
"esri/core/reactiveUtils",
"esri/tasks/GeometryService"
], (Map,MapView,Sketch,GraphicsLayer,Graphic,  Draw, 
MapImageLayer,FeatureLayer, FeatureTable, reactiveUtils,EsriGeometryService) => {
const graphicsLayer = new GraphicsLayer();
console.log(graphicsLayer);
const layer = new MapImageLayer({
      url: "https://localhost:6443/arcgis/rest/services/CamSon/MapServer",
    });
const map = new Map({
  basemap: "dark-gray-vector",
  layers: [layer,graphicsLayer],
});
const view = new MapView({
  container: "viewDiv",
  map: map,
  zoom: 12,
  center: [106.084167,10.368333]
});
const point = {
type: "point", // autocasts as new Point()
longitude: -49.97,
latitude: 41.73
};
// Create a symbol for drawing the point
const markerSymbol = {
type: "simple-marker", // autocasts as new SimpleMarkerSymbol()
color: [226, 119, 40],
outline: {
// autocasts as new SimpleLineSymbol()
color: [255, 255, 255],
width: 2
}
};
// Create a graphic and add the geometry and symbol to it
const pointGraphic = new Graphic({
geometry: point,
symbol: markerSymbol
});

const polyline = {
type: "polyline", // autocasts as new Polyline()
paths: [[-111.3, 52.68], [-98, 49.5], [-93.94, 29.89]]
};
// Create a symbol for drawing the line
const lineSymbol = {
type: 'simple-line', // autocasts as SimpleLineSymbol()
color: [226, 119, 40],
width: 4
};
// Create an object for storing attributes related to the line
const lineAtt = {
Name: "Keystone Pipeline",
Owner: "TransCanada",
Length: "3,456 km"
};
const polylineGraphic = new Graphic({
geometry: polyline,
symbol: lineSymbol,
attributes: lineAtt,
popupTemplate: {
// autocasts as new PopupTemplate()
title: "{Name}",
content: [
{
type: "fields",
fieldInfos: [
{
  fieldName: "Name"
},
{
  fieldName: "Owner"
},
{
  fieldName: "Length"
}
]
}
]
}
});

var cactoado = polygons;
console.log(cactoado);
     
const polygon = {
type: "polygon", // autocasts as new Polygon()
rings: cactoado
};
const fillSymbol = {
type: "simple-fill", 
color: [227, 139, 79, 0.8],
outline: {
color: [255, 255, 255],
width: 1
}
};
const polygonGraphic = new Graphic({
geometry: polygon,
symbol: fillSymbol,
});
view.graphics.addMany([pointGraphic, polylineGraphic, polygonGraphic]);
const measureThisAction = {
title: "Measure Length",
id: "cu",
image: "https://developers.arcgis.com/javascript/latest//sample-code/popup-actions/live/Measure_Distance16.png"
};
const template = {          
title: "Feature Info {mavua}",
content: [
{
type: "fields",
fieldInfos: [
{
fieldName: "objectid",
label: "Mã vựa"
},
{
fieldName: "dientich",
label: "Diện tích"
},
]
}
]
};
const featureLayer = new FeatureLayer({
url: "https://localhost:6443/arcgis/rest/services/CamSon/FeatureServer",
popupTemplate: template
});
map.add(featureLayer);

view.on('pointer-move', (event)=>{
let point = view.toMap({x: event.x, y: event.y});
let lat = point.latitude;
let lon = point.longitude;
document.getElementById('coorhead').innerHTML = `${lat},${lon}`;
})
reactiveUtils.on(
() => view.popup,
"trigger-action",
(event) => {
if (event.action.id === "cu") {
alert("ok");
}
}
);
view.when(() => {
const appContainer = document.getElementById("appContainer");
const tableContainer = document.getElementById("tableContainer");
const tableDiv = document.getElementById("tableDiv");
const sketch = new Sketch({
layer: graphicsLayer,
view: view,
creationMode: "update",
});
view.when(() => {
sketch.on("create", (event) => {
let coords = event.geometry.rings || event.geometry.paths;
document.getElementById("shape").innerHTML = JSON.stringify(coords);
       
});
});
const featureTable = new FeatureTable({
view: view, // make sure to pass in view in order for selection to work
layer: featureLayer,
tableTemplate: {
// autocasts to TableTemplate
columnTemplates: [
// takes an array of GroupColumnTemplate and FieldColumnTemplate
{
  // autocasts to FieldColumnTemplate
  type: "field",
  fieldName: "OBJECTID",
  label: "State",
  direction: "asc"
},
{
  type: "field",
  fieldName: "maxa",
  label: "Private school percentage"
},
{
  type: "field",
  fieldName: "shape",
  label: "Public school percentage"
}
]
},
container: tableDiv
});
view.ui.add(document.getElementById("mainDiv"), "top-right");
const checkboxEle = document.getElementById("checkboxId");
const labelText = document.getElementById("labelText");
// Listen for when toggle is changed, call toggleFeatureTable function
checkboxEle.onchange = () => {
toggleFeatureTable();
};
function toggleFeatureTable() {
// Check if the table is displayed, if so, toggle off. If not, display.
if (!checkboxEle.checked) {
appContainer.removeChild(tableContainer);
labelText.innerHTML = "Hiện thông tin";
} else {
appContainer.appendChild(tableContainer);
labelText.innerHTML = "Ẩn thông tin";
}
}
view.ui.add(sketch, "top-right");
});
// add the button for the draw tool
const draw = new Draw({
view: view
});
// Create a button element
const lineButton = document.createElement('button');
// Set the button's ID
lineButton.id = 'line-button';
// Add the button to the view's UI
view.ui.add(lineButton, 'top-left');
// draw polyline button
document.getElementById("line-button").onclick = () => {
view.graphics.removeAll();
// creates and returns an instance of PolyLineDrawAction
const action = draw.create("polyline");
// focus the view to activate keyboard shortcuts for sketching
view.focus();
// listen polylineDrawAction events to give immediate visual feedback
// to users as the line is being drawn on the view.
action.on(
[
"vertex-add",
"vertex-remove",
"cursor-update",
"redo",
"undo",
"draw-complete"
],
updateVertices
);
};
// Checks if the last vertex is making the line intersect itself.
function updateVertices(event) {
// create a polyline from returned vertices
if (event.vertices.length > 1) {
const result = createGraphic(event);
// if the last vertex is making the line intersects itself,
// prevent the events from firing
if (result.selfIntersects) {
event.preventDefault();
}
}
}
// create a new graphic presenting the polyline that is being drawn on the view
});