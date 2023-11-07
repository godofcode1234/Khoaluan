

<table class="table table-bordered table-striped">

  <thead>
    <tr>
        <th>idcanbo</th>
        <th>tencanbo</th> 
        <th>chucvu</th> 
        <th>sdt</th> 
        <th>email</th>
    </tr>
  </thead>
  
  <tbody>
  
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