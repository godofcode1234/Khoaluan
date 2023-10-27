require([
  "esri/Map",
  "esri/views/MapView",
  "esri/layers/MapImageLayer",
  "esri/layers/GraphicsLayer",
  "esri/layers/FeatureLayer",
  "esri/Graphic",
  "esri/widgets/FeatureTable",
  "esri/widgets/Sketch",
  "esri/geometry/SpatialReference",
  "esri/geometry/support/webMercatorUtils"
], (Map, MapView, MapImageLayer, GraphicsLayer, FeatureLayer, Graphic, FeatureTable, Sketch, SpatialReference, webMercatorUtils) => {
  const graphicsLayer = new GraphicsLayer();
  const layer = new MapImageLayer({
    url: "https://localhost:6443/arcgis/rest/services/CamSon/MapServer",
  });
  const map = new Map({
    basemap: "dark-gray-vector",
    layers: [layer, graphicsLayer],
  });
  const view = new MapView({
    container: "viewDiv",
    map: map,
    zoom: 12,
    center: [106.084167, 10.368333]
  });
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
  const point = {
    type: "point",
    longitude: -49.97,
    latitude: 41.73
  };
  const markerSymbol = {
    type: "simple-marker",
    color: [226, 119, 40],
    outline: {
      color: [255, 255, 255],
      width: 2
    }
  };
  const pointGraphic = new Graphic({
    geometry: point,
    symbol: markerSymbol
  });
  const polyline = {
    type: "polyline",
    paths: [[-111.3, 52.68], [-98, 49.5], [-93.94, 29.89]]
  };
  const lineSymbol = {
    type: "simple-line",
    color: [226, 119, 40],
    width: 4
  };
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
  const cactoado = [[1, 2], [3, 4]];
  console.log(cactoado);
  const polygon = {
    type: "polygon",
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
  const featureTable = new FeatureTable({
    view: view,
    layer: featureLayer,
    tableTemplate: {
      columnTemplates: [
        {
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
  view.when(() => {
    const wgs84 = new SpatialReference({
      wkid: 4326
    });
    view.spatialReference = wgs84;
    const appContainer = document.getElementById("appContainer");
    const tableContainer = document.getElementById("tableContainer");
    const tableDiv = document.getElementById("tableDiv");
    const sketch = new Sketch({
      layer: graphicsLayer,
      view: view,
      creationMode: "update"
    });
    view.when(() => {
      sketch.on("create", (event) => {
        const coords = webMercatorUtils.project(
          event.graphic.geometry, wgs84
        );
        document.getElementById("shape").innerHTML = JSON.stringify(coords);
      });
    });
    view.ui.add(sketch, "top-right");
  });
  view.ui.add(document.getElementById("mainDiv"), "top-right");
  const tableContainer = document.getElementById("tableContainer");
  const checkboxEle = document.getElementById("checkboxId");
  const labelText = document.getElementById("labelText");
  checkboxEle.onchange = () => {
    toggleFeatureTable();
  };
  function toggleFeatureTable() {
    if (!checkboxEle.checked) {
      appContainer.removeChild(tableContainer);
      labelText.innerHTML = "Hiện thông tin";
    } else {
      appContainer.appendChild(tableContainer);
      labelText.innerHTML = "Ẩn thông tin";
    }
  }
});