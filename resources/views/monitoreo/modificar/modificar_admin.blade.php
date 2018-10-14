<div class="row">
    <div class="col s12 m3"></div>
    <div class="col s12 m6">
        <div class="card">
            <div class="card">
                <div class="card-content">
                    <form action="" method="post" id="formmodificar">
                        <span class="card-title">Modificar registro</span>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">calendar_today</i>
                                <input name="semana" id="semanainput" type="number" class="validate" required>
                                <label for="semanainput">Semana</label>
                            </div>
                        </div>
                        <button class="btn-floating btn-large waves-effect waves-light red right tooltipped" type="submit" data-tooltip="Búscar"><i class="material-icons">search</i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="renderspace"></div>
</div>
<script src="{{asset('js/modificar_admin.js')}}"></script>
