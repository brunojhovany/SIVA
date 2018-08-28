<option value="0">Dirección</option>
@foreach ($query as $D)
    <option value="{{$D->idregistro}}"><strong>{{$D->folio}}</strong>&nbsp;{{$D->domicilio}}</option>
@endforeach