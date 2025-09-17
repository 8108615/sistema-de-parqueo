<hr>
<div class="row">
    <div class="col-md-6">
        <p><b>Informacion del Cliente</b></p>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombres"><i class="fas fa-user"></i> Nombre Completo</label>
                    <p>{{ $vehiculo->cliente->nombres }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="numero_documento"><i class="fas fa-id-card"></i> Numero de Documento</label>
                    <p>{{ $vehiculo->cliente->numero_documento }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Correo Electronico</label>
                    <p>{{ $vehiculo->cliente->email }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="celular"><i class="fas fa-mobile-alt"></i> Celular</label>
                    <p>{{ $vehiculo->cliente->celular }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <p><b>Informacion del Vehiculo</b></p>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="placa">Placa del Vehiculo</label>
                    <p>{{ $vehiculo->placa }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <p>{{ $vehiculo->marca }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <p>{{ $vehiculo->modelo }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="color">Color</label>
                    <p>{{ $vehiculo->color }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipo">Tipo de Vehiculo</label>
                    <p>{{ $vehiculo->tipo }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
