<div class="modal fade modal-slide-in-center" aria-hidden="true" role="dialog" tabindex="-1" id="modal-add">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="formModalLabel">Crear Administrador</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['url' => 'mantenimiento/administrador', 'method' => 'POST', 'autocomplete' => 'off', 'files' => 'true']) !!}
            {!! Form::token() !!}
            <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre <span class="text-danger" title="Campo obligatorio">*</span> </label>
                        <div class="input-group a mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="fas fa-box-open fa-2x-x"></span></span>
                            </div>
                            <input type="text" class="form-control fi"  name="nomPromoter"
                                placeholder="Ingrese nombre" autocomplete="off" value="{{ old('nomPromoter') }}" required>
                        </div>
                        {!! $errors->first('nomPromoter', '<span class="help-block text-danger"><b>:message </b></span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Email <span class="text-danger" title="Campo obligatorio">*</span> </label>
                        <div class="input-group a mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="fas fa-box-open fa-2x-x"></span></span>
                            </div>
                            <input type="email" class="form-control fi"  name="email"
                                placeholder="Ingrese email" autocomplete="off" value="{{ old('email') }}" required>
                        </div>
                        {!! $errors->first('email', '<span class="help-block text-danger"><b>:message </b></span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Password <span class="text-danger" title="Campo obligatorio">*</span> </label>
                        <div class="input-group a mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="fas fa-box-open fa-2x-x"></span></span>
                            </div>
                            <input type="password" class="form-control fi"  name="password"
                                placeholder="Ingrese password" autocomplete="off" value="{{ old('password') }}" required>
                        </div>
                        {!! $errors->first('password', '<span class="help-block text-danger"><b>:message </b></span>') !!}
                    </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-dark" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-dark">Guardar</button>
            </div>
            {{ Form::Close() }}
        </div>
    </div>
</div>
