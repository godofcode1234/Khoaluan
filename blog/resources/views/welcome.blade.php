
  <head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://js.arcgis.com/4.27/esri/themes/light/main.css" />
<script src="https://js.arcgis.com/4.27/"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="map.css">
<script src="{{ asset('map.js') }}"></script>
    <label id="coorhead"></label>
  </head>

<body>
 
  <div id="appContainer">
    <div id="viewDiv"></div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb" style="background: none">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
      </ol>
    </nav>
    <textarea name="paths" id="paths" type="text" cols="30" rows="1"></textarea>
        <button id="opendialog" style="display: none">tạo vùng trồng</button>
      <div id="dialog" class="dialog">
        <form method="POST" id="form-insert" action="{{route('vungtrong.store')}}">
          @csrf
          <textarea name="shape" id="shape" type="text" cols="30" rows="1"></textarea>
          
          
        <label for="iddiachinh">ID địa chính</label>
        <input type="text" value="1" name="iddiachinh" id="iddiachinh" placeholder="ID địa chính">
    
        <label for="idvungtrong">ID vùng trồng</label>
        <input type="text" value="1" name="idvungtrong" id="idvungtrong" placeholder="ID vùng trồng">
    
        <label for="dientich">Diện tích</label>
        <input type="text" value="23" name="dientichtrong" id="dientich" placeholder="Diện tích">
    
        <label for="giongcay">Giống cây</label>
        <input type="text" value="hà lan" name="giongcay" id="giongcay" placeholder="Giống cây">
    
        <label for="tuoicay">Tuổi cây</label>
        <input type="text" value="18" name="tuoicay" id="tuoicay" placeholder="Tuổi cây">
    
        <label for="giaidoansinhtruong">Giai đoạn sinh trưởng</label>
        <input type="text" value="1" name="giaidoansinhtruong" id="giaidoansinhtruong" placeholder="Giai đoạn sinh trưởng">
    
        <label for="ngaytrong">Ngày trồng</label>
        <input type="text" value="" name="ngaytrong" id="ngaytrong" placeholder="Ngày trồng">
    
        <label for="loaidat">Loại đất</label>
        <input type="text" value="mùn" name="loaidat" id="loaidat" placeholder="Loại đất">
    
          <button type="submit">Lưu</button>
      </form>
        <button id="closeButton">Close</button>
        {{-- <div class="form-group">
          <label for="exampleInputtext1">Loại bệnh <span style="color: red">*</span></label>
          <select id="saubenh" class="form-control" name="saubenh" required>
              <option value="">Chọn loại bệnh</option>
              @foreach ($saubenh as $sb)
                  <option value="{{ $sb->idsaubenh }}">{{ $sb->tensaubenh }}</option>
              @endforeach
          </select>
      </div> --}}
      </div>
      <button id="opendialogsaubenh" style="display: block">tạo vùng sâu bệnh</button>
      <div id="dialogsaubenh" class="dialogsaubenh">
      <form method="POST" action="{{ route('saubenh.store') }}">
        @csrf
         <label for="idsaubenh">ID sau bệnh:</label> 
         <input type="text" name="idsaubenh" id="idsaubenh" placeholder="ID sau bệnh"> 
        <label for="idvungtrong">ID vùng trồng:</label> 
        <input type="text" name="idvungtrong" id="idvungtrong" placeholder="ID vùng trồng" required> 
        <label for="tensaubenh">Tên sau bệnh:</label> 
        <input type="text" name="tensaubenh" id="tensaubenh" placeholder="Tên sau bệnh" required> 
        <label for="mucdogayhai">Mức độ gây hại:</label> 
 <input type="number" name="mucdogayhai" id="mucdogayhai" placeholder="Mức độ gây hại" required> 
 <label for="thoigianphathien">Thời gian phát hiện:</label> 
 <input type="text" name="thoigianphathien" id="thoigianphathien" placeholder="Thời gian phát hiện" required> 
 <label for="hinhanh">Hình ảnh:</label> 
 <input type="number" name="hinhanh" id="hinhanh" placeholder="Hình ảnh" min="0"> 
 <label for="mota">Mô tả:</label> 
 <textarea name="mota" id="mota" placeholder="Mô tả"></textarea> 
 <label for="phuongphap">Phương pháp:</label> 
 <textarea name="phuongphap" id="phuongphap" placeholder="Phương pháp"></textarea>
        <button type="submit">Lưu</button>
        <button id="closeButtonsaubenh">Close</button>
      </div>
      <script>
        // Lấy phần tử dialogsaubenh
const dialogsaubenh = document.getElementById("dialogsaubenh");

// Lấy button mở dialog 
const opendialogsaubenh = document.getElementById("opendialogsaubenh");

// Hàm mở dialogsaubenh
function openDialogsaubenh(event) {
  event.preventDefault();
  dialogsaubenh.style.display = "block";
} 

// Gán sự kiện click cho button opendialogsaubenh
opendialogsaubenh.addEventListener('click', openDialogsaubenh); 

// Lấy button đóng dialog
const closeButtonsaubenh = document.getElementById("closeButtonsaubenh");

// Hàm đóng dialogsaubenh 
function closeDialogsaubenh(event) {
  event.preventDefault();
  dialogsaubenh.style.display = "none";
}

// Gán sự kiện click cho button đóng dialog
closeButtonsaubenh.addEventListener("click", closeDialogsaubenh);
      </script>
      <label>
        <input type="radio" name="options" value="polygon" checked >
        Đa giác
      </label>
      <label>
        <input type="radio" name="options" value="polyline">
        Hình học
      </label>
      <input type="checkbox" id="cbCanUoc" name="canuoc">
      <label for="cbCanUoc">Cả nước</label>

<input type="checkbox" id="cbTinh" name="tinh">  
<label for="cbTinh">Tỉnh</label>

<input type="checkbox" id="cbHuyen" name="huyen">
<label for="cbHuyen">Huyện</label>

<input type="checkbox" id="cbXa" name="xa">
<label for="cbXa">Xã</label>
  
    <div id="tableContainer" class="container">
      <div id="tableDiv"></div>
    </div>
    <div id="mainDiv" class="esri-widget">
      <label class="switch">
        <input id="checkboxId" type="checkbox" checked="no" />
        <span class="slider round"></span>
      </label>
      <label class="labelText" id="labelText">Ẩn thông tin</label>
    </div>
  </div>    
  </div>
  
</body>
</html>
<script>
var polygons = [];
@foreach ($shape as $polygon);
var coordinates = {{ $polygon->shape}};
if(coordinates!=null)
{
        polygons.push(coordinates);
       // alert(polygons);
}
@endforeach
</script>
<script>
  var polygonssaubenh = [];
  @foreach ($shapesaubenh as $polygon);
  var coordinates = {{ $polygon->shapesaubenh}};
  if(coordinates!=null)
  {
          polygonssaubenh.push(coordinates);
         
  }
  @endforeach
  </script>
{{-- <script>
var paths = [];
@foreach ($polygonCoordinates as $polygon);
var coordinatespaths = {{ $polygon->paths}};
if(coordinatespaths!=null)
{
        paths.push(coordinatespaths);
}
@endforeach
</script> --}}


<script>
const dialog = document.getElementById("dialog");
const closeButton = document.getElementById("closeButton");
const opendialogButton = document.getElementById('opendialog');

opendialogButton.addEventListener('click', function(event) {

event.preventDefault();

openDialog(event);

});
  closeButton.addEventListener("click", closeDialog);
  function openDialog(event) {
    event.preventDefault();
  dialog.style.display = "block";
}

function closeDialog(event) {
    event.preventDefault();
  dialog.style.display = "none";
  opendialogButton.style.display = "none";
}
</script>
