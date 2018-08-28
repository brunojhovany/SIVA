    <option value="" disabled selected>Municipio</option>
@foreach ($query as $M)
    <option value="{{$M->idmunicipio}}">{{$M->nombreM}}</option>
@endforeach