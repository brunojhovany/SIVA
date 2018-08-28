<option value="" disabled selected>Localidad</option>
@foreach ($query as $M)
<option value="{{$M->idlocalidades}}">{{$M->nombreL}}</option>
@endforeach