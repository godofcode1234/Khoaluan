<ul>
    <li>Witcher 3</li>
    <li>Mass Effect 3</li>
    <li>game te</li>
</ul>
<form style="margin-top: 20px">
                <table id="list" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Địa danh</th>
                            <th>Dài</th>
                            <th>Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody id="list-view">
                       
                        @foreach ($diadanh as $key => $ddanh)
                            <tr id="list-non">
                                <td>{{ $key + 1 }}</td>
                                <td><a data-name="danh" data-type="text">{{ $ddanh->diemcanhbao }}</a></td>
                                <td><a data-name="dai" data-type="text">{{ $ddanh->dodai }}</a></td>
                                <td><a data-name="ghichu" data-type="text">{{ $ddanh->ghichu }}</a></td>
                                <td style="display: none"><a data-name="shape" data-type="text">{{ $ddanh->shape }}</a></td>
                            </tr>
                        @endforeach
                            
                    </tbody>
                </table>
            </form>