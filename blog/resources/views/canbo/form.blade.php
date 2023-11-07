{!! Form::open(['route' => 'canbo.store']) !!}

  <div class="form-group">
    {!! Form::label('idcanbo', 'ID cán bộ:') !!}
    {!! Form::number('idcanbo', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">  
    {!! Form::label('tencanbo', 'Tên cán bộ:') !!}
    {!! Form::text('tencanbo', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('chucvu', 'Chức vụ:') !!} 
    {!! Form::number('chucvu', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('sdt', 'Số điện thoại:') !!}
    {!! Form::text('sdt', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
  </div>

  {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}