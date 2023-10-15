<table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
      </tr>
    </thead>
  
    <tbody>
      @foreach($diadanh as $item)
        <tr>
          <td>{{ $item->diemcanhbao }}</td>
          <td>{{ $item->mota }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>