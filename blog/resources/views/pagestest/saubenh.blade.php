<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

</head>
<body>

    <form method="POST" action="{{ route('saubenh.store') }}">
    @csrf
    <input type="text" name="idsaubenh" placeholder="ID sau bệnh" required>
    <input type="text" name="idvungtrong" placeholder="ID vùng trồng" required>
    <input type="text" name="tensaubenh" placeholder="Tên sau bệnh" required>
    <input type="number" name="mucdogayhai" placeholder="Mức độ gây hại" required>
    <input type="text" name="thoigianphathien" id="thoigian" placeholder="Thời gian phát hiện" required>
    <input type="number" name="hinhanh" placeholder="Hình ảnh" min="0">
    <textarea name="mota" placeholder="Mô tả"></textarea>
    <textarea name="phuongphap" placeholder="Phương pháp"></textarea>
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
                    <th>idsaubenh</th>
                    <th>idvungtrong</th>
                    <th>tensaubenh</th>
                    <th>mucdogayhai</th>
                    <th>thoigianphathien</th>
                    <th>hinhanh</th>
                    <th>mota</th>
                    <th>phuongphap</th>
                </tr>
            </thead>
            <tbody id="list-view">
                @foreach ($saubenh as $k)
                    <tr id="list-non">
                        <td><a data-name="j" data-type="text">{{ $k->idsaubenh }}</a></td>
                        <td><a data-name="l" data-type="text">{{ $k->idvungtrong }}</a></td>
                        <td><a data-name="q" data-type="text">{{ $k->tensaubenh }}</a></td>
                        <td><a data-name="p" data-type="text">{{ $k->mucdogayhai }}</a></td>
                        <td><a data-name="d" data-type="text">{{ $k->thoigianphathien }}</a></td>
                        <td><a data-name="f" data-type="text">{{ $k->hinhanh }}</a></td>
                        <td><a data-name="a" data-type="text">{{ $k->mota }}</a></td>
                        <td><a data-nzame="h" data-type="text">{{ $k->phuongphap }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</body>