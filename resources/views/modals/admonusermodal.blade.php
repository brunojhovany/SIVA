<form method="post" id="editusersform">
    <div class="modal-content">
        <h4>Editar usuario</h4>
        @foreach ($user as $item)
            <input type="hidden" name="userId" value="{{$item->id}}">
        
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="Name" value="{{$item->name}}" type="text" name="Name" class="validate">
                <label for="Name">Nombre</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="email" value="{{$item->email}}" type="text" name="Email" type="email" class="validate">
                <label for="email">Correo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="password" value="" type="password" name="Password" class="validate">
                <label for="password">Contraseña</label>
            </div>
            <div class="input-field col s12 m6">
                <select id='userTipe' required name="UserTipe" oninvalid="M.toast({html:'Seleccione una Localidad',classes:'rounded red'})">
                    <option value="{{$item->profile}}" disabled selected>{{$item->level}}</option>
                    @foreach ($usrlevels as $usrlv)
                        <option value="{{$usrlv->id}}">{{$usrlv->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div id="jurisdiccionrow" class="row" @if ($item->profile == 2)
        @else
            hidden
        @endif>
            <div class="input-field col s12 m6">
                <select id='Jurisdiccion' name="Jurisdiccion" oninvalid="M.toast({html:'Seleccione una jursdicción',classes:'rounded red'})">
                    <option value="{{$item->jurisdiccion}}" disabled selected>{{$item->nombreJ}}</option>
                    @foreach ($jurisdicciones as $jurisdiccion)
                        <option value="{{$jurisdiccion->idjurisdiccion}}">{{$jurisdiccion->nombreJ}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endforeach
</div>
<div class="modal-footer">
    <button type="submit" class="waves-effect waves-green btn-flat">save</button>
</div> 
</form>
<script>
M.updateTextFields(); $('select').formSelect();
$(document).ready(function(ev) {
    $('#userTipe').on('change',function() {
       if ($(this).val()==2) {
            document.getElementById('jurisdiccionrow').removeAttribute('hidden');
       }else{
            document.getElementById('jurisdiccionrow').setAttribute('hidden','');
       }
    });
    $('#editusersform').on('submit', function (ev) {
        ev.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/configuracion/api/admonusers/updateusers",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 60000,
            success: function (data) {
                swal("Buen trabajo!", `${data.message}`, "success");
            },
            error: function (data) {
                swal({
                    type: "error",
                    title: "Oops...",
                    text: `Something went wrong! ${
                        data.responseJSON.message
                        }`
                });
            }
        });
    });
});
</script>