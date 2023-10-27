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
<body>
    <form id="form-insert" method="POST">
        @csrf
        <input type="text" name="idkhuyencao" placeholder="ID khuyến cảo">
        <input type="text" value="ds" name="noidung" placeholder="Nội dung">
        <input type="text" value="2023-10-23 00:13:10" name="thoigian" id="thoigian" placeholder="Thời gian">
        <input type="text" value="2" name="idcanbo" placeholder="ID cán bộ">
        <button type="submit">Lưu</button>
    </form>
    <script>
        $(function() {
            $('#thoigian').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss'
            });
        });
    </script>
<form>             
    <table id="bang-khuyen-cao" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>idkhuyencao</th>
                <th>noidung</th>
                <th>thoigian</th>
                <th>idcanbo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="list-view">
            @foreach ($khuyencao as $kc)
                <tr id="list-non">
                    <td data-id="{{ $kc->idkhuyencao }}">{{ $kc->idkhuyencao }}</td>
                    <td><a data-name="dai" data-type="text">{{ $kc->noidung }}</a></td>
                    <td><a data-name="ghichu" data-type="text">{{ $kc->thoigian }}</a></td>
                    <td data-id="{{ $kc->idcanbo }}">{{ $kc->idcanbo }}</td>
                    <td>
                        <button onclick="editRow(this)">Chỉnh sửa</button> <!-- Nút chỉnh sửa -->
                        <button onclick="deleteRow(this, {{ $kc->idkhuyencao }}, {{ $kc->idcanbo }})">Xóa</button> <!-- Nút xóa -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>
<script>
    function deleteRow(button) {
    var row = button.parentNode.parentNode;
    let idkhuyencao = row.querySelector("td[data-id]").dataset.idkhuyencao;
    let idcanbo = row.querySelector("td[data-id]").dataset.idcanbo;
    $.ajax({
      url: '/khuyencao/' + idkhuyencao + '/' + idcanbo,
      type: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
        // Kiểm tra xem dữ liệu đã được xóa hay chưa
        if (!document.getElementById('row-' + idkhuyencao + '-' + idcanbo)) {
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
            
              idkhuyencao: this.querySelector("td:nth-child(1) a").textContent,
              noidung: this.querySelector("td:nth-child(2) a").textContent,
              thoigian: this.querySelector("td:nth-child(3) a").textContent,
              idcanbo: this.querySelector("td:nth-child(4) a").textContent,
              
          };

          // Hiển thị dữ liệu lên các input
          document.querySelector("input[name='idkhuyencao']").value = selectedRowData.idkhuyencao;
          document.querySelector("input[name='noidung']").value = selectedRowData.noidung;
          document.querySelector("input[name='thoigian']").value = selectedRowData.thoigian;
          document.querySelector("input[name='idcanbo']").value = selectedRowData.idcanbo;
       
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
{{-- <script>
    $("#form-insert").submit(function(e) {
 var formData = $(this).serialize();
 $.ajax({
   url: "{{ route('khuyencao.store') }}",
   type: "POST",
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
   data: formData,
   cache: false,
   success: function(response) {
     // Thêm dữ liệu thành công
     console.log(response);     
   }
 });
 });
 </script> --}}
 
 