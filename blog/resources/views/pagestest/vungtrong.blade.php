<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    #bang-khuyen-cao tbody tr.active {
    background-color: #f5f5f5;
}
</style>

<body>
    <form method="POST" id="form-insert" >
        @csrf
        <input type="text" value="1" name="iddiachinh" placeholder="ID địa chính">
        <input type="text" value="1" name="idvungtrong" placeholder="id vùng trồng">
        <input type="text" value="23" name="dientichtrong" id="dientich" placeholder="diện tích">
        <input type="text" value="hà lan" name="giongcay" placeholder="giống cây">
        <input type="text" value="18" name="tuoicay" placeholder="tuổi cây">
        <input type="text" value="1" name="giaidoansinhtruong" placeholder="giai đoạn">
        <input type="text" value="" name="ngaytrong" id="thoigian" placeholder="ngày trồng">
        <input type="text" value="mùn" name="loaidat" placeholder="loại đất">
        <button type="submit">Lưu</button>
    </form>
    <script>
        // $(function() {
        //     $('#dientich').datetimepicker({
        //         format: 'YYYY-MM-DD HH:mm:ss'
        //     });
        // });
    </script>
    
<form>
                       
    <table id="bang-khuyen-cao" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>iddiachinh</th>
            <th>idvungtrong</th>
            <th>dientichtrong</th>
            <th>giongcay</th>
            <th>tuoicay</th> 
            <th>giaidoansinhtruong</th>
            <th>ngaytrong</th>
            <th>loaidat</th> 
        </tr>
    </thead>
    <tbody id="list-view">
        @foreach ($vungtrong as $kc)
            <tr id="list-non">
                <td><a data-name="a" data-type="text">{{ $kc->iddiachinh }}</a></td>
                <td data-id="{{ $kc->idvungtrong }}">{{ $kc->idvungtrong }}</a></td>
                <td><a data-name="c" data-type="text">{{ $kc->dientichtrong }}</a></td>
                <td><a data-name="d" data-type="text">{{ $kc->giongcay }}</a></td>
                <td><a data-name="e" data-type="text">{{ $kc->tuoicay }}</a></td>
                <td><a data-name="f" data-type="text">{{ $kc->giaidoansinhtruong }}</a></td>
                <td><a data-name="g" data-type="text">{{ $kc->ngaytrong }}</a></td>
                <td><a data-name="h" data-type="text">{{ $kc->loaidat }}</a></td>
                
                <td>
                    <button onclick="editRow(this)">Chỉnh sửa</button> <!-- Nút chỉnh sửa -->
                    <button onclick="deleteRow(this,{{$kc->idvungtrong}})">Xóa</button> <!-- Nút xóa -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>  
     function deleteRow(button, idvungtrong) {
  var row = button.parentNode.parentNode;
  if (!idvungtrong) {
    idvungtrong = row.querySelector("td[data-id]").getAttribute("data-id");
  }  
  $.ajax({
    url: '/vungtrong/' + idvungtrong,
    type: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      // Kiểm tra xem dữ liệu đã được xóa hay chưa
      if (!document.getElementById('row-' + idvungtrong)) {
        console.log('Dữ liệu đã được xóa');
      } else {
        console.log('Dữ liệu chưa được xóa');
      }
      // Xóa dòng khỏi bảng
      row.remove();
      console.log("ok");
    },
    error: function(xhr, status, error) {
      // Xử lý lỗi (nếu có)
      alert('Có lỗi xảy ra khi xóa dữ liệu');
      console.log(error);
    }
  });
}
</script>

</form>
<script>
    $("#form-insert").submit(function(e) {
 var formData = $(this).serialize();
 $.ajax({
   url: "{{ route('vungtrong.store') }}",
   type: 'POST',
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
   data: formData,
   success: function(response) {
     // Thêm dữ liệu thành công
     console.log(response);      
   } 
 }); 
 });
 </script>
 
 {{-- <script>
    // Lưu trữ dữ liệu của dòng được chọn
    let selectedRowData = {};

    // Lấy danh sách các dòng trong bảng
    const rows = document.querySelectorAll("#bang-khuyen-cao tbody tr");

    // Đăng ký sự kiện click cho mỗi dòng trong bảng
    rows.forEach(row => {
        row.addEventListener("click", function() {
            // Xóa lớp active của tất cả các dòng
            rows.forEach(row => row.classList.remove("active"));

            // Thêm lớp active cho dòng được chọn
            this.classList.add("active");

            // Lấy dữ liệu từ các ô trong dòng được chọn
            selectedRowData = {
                iddiachinh: this.querySelector("td:nth-child(1) a").textContent,
                idvungtrong: this.querySelector("td:nth-child(2) a").textContent,
                dientichtrong: this.querySelector("td:nth-child(3) a").textContent,
                giongcay: this.querySelector("td:nth-child(4) a").textContent,
                tuoicay: this.querySelector("td:nth-child(5) a").textContent,
                giaidoansinhtruong: this.querySelector("td:nth-child(6) a").textContent,
                ngaytrong: this.querySelector("td:nth-child(7) a").textContent,
                loaidat: this.querySelector("td:nth-child(8) a").textContent
            };

            // Hiển thị dữ liệu lên các input
            document.querySelector("input[name='iddiachinh']").value = selectedRowData.iddiachinh;
            document.querySelector("input[name='idvungtrong']").value = selectedRowData.idvungtrong;
            document.querySelector("input[name='dientichtrong']").value = selectedRowData.dientichtrong;
            document.querySelector("input[name='giongcay']").value = selectedRowData.giongcay;
            document.querySelector("input[name='tuoicay']").value = selectedRowData.tuoicay;
            document.querySelector("input[name='giaidoansinhtruong']").value = selectedRowData.giaidoansinhtruong;
            document.querySelector("input[name='ngaytrong']").value = selectedRowData.ngaytrong;
            document.querySelector("input[name='loaidat']").value = selectedRowData.loaidat;
        });
    });

    // Hàm xử lý khi form được submit
    document.querySelector("#form-insert").addEventListener("submit", function(e) {
        e.preventDefault();
        // Thực hiện các xử lý lưu dữ liệu
        // ...
        // Reset dữ liệu và bỏ lớp active của các dòng
        rows.forEach(row => row.classList.remove("active"));
        selectedRowData = {};
        this.reset();
    });
</script> --}}
</body>
<script>
  @if ($errors->any())
<div class="alert alert-danger">
{{ $errors->first() }}
</div>
@endif
</script>