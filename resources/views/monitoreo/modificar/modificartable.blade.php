<div class="container">
    <form method="POST" id="modificarregistroForm">
        @csrf
        <table class="striped highlight responsive-table">
            <thead>
                <th hidden>ID</th>
                <th>Folio</th>
                <th>Municipio</th>
                <th>Localidad</th>
                <th>Domicilio</th>
                <th>Habilitar</th>
            </thead>
            <tbody>
                @foreach ($Registros as $R)
                <tr>
                    <td hidden><input name="{{$R->idregistro}}[idregistro]" type="text" value="{{$R->idregistro}}"></td>
                    <td>{{$R->folio}}</td>
                    <td>{{$R->nombreM}}</td>
                    <td>{{$R->nombreL}}</td>
                    <td>{{$R->domicilio}}</td>
                    <td>
                        <p>
                            <label>
                                <input name="{{$R->idregistro}}[MuestraBacteriologica]" type="checkbox" class="filled-in" />
                                <span></span>
                            </label>
                        </p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button id="submitMod" type="submit" class="btn-floating btn-large waves-effect waves-light red right tooltipped" data-position="bottom" data-tooltip="Guardar" style="display:none;"><i class="material-icons">save_alt</i></button>
    </form>
    {{ $Registros->links()}}
</div>