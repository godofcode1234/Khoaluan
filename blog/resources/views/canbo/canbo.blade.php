@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

</head>
<body>

        <form method="POST" action="{{ route('canbo.store') }}">
        @csrf
        <input type="number" name="idcanbo" placeholder="ID cán bộ">
        <input type="text" name="tencanbo" placeholder="Tên cán bộ">
        <input type="number" name="chucvu" placeholder="Chức vụ">
        <input type="text" name="sdt" placeholder="Số điện thoại">
            <input type="email" name="email" placeholder="Email">
        <button type="submit">Lưu</button>
    </form>

    <form>
        <table id="bang-khuyen-cao" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>idcanbo</th>
                     <th>tencanbo</th> 
                     <th>chucvu</th> 
                     <th>sdt</th> 
                     <th>email</th>
                </tr>
            </thead>
            <tbody id="list-view">
                @foreach ($canbo as $k)
                    <tr id="list-non">
                        <td><a data-name="j" data-type="text">{{ $k->idcanbo }}</a></td>
                        <td><a data-name="l" data-type="text">{{ $k->tencanbo }}</a></td>
                        <td><a data-name="q" data-type="text">{{ $k->chucvu }}</a></td>
                        <td><a data-name="p" data-type="text">{{ $k->sdt }}</a></td>
                        <td><a data-name="d" data-type="text">{{ $k->email }}</a></td>
                        <td>
                            <button onclick="editRow()">Chỉnh sửa</button> <!-- Nút chỉnh sửa -->
                            <button onclick="deleteRow()">Xóa</button> <!-- Nút xóa -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </form>
</body>
@endsection