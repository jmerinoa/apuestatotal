<style>
    .imagen img {
        background: #f8eded;
        width: 100px;
        height: auto;
    }

</style>
<div class="modal fade modal-slide-in-center" aria-hidden="true" role="dialog" tabindex="-1" id="modal-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="formModalLabel"><i class="fas fa-rectangle-portrait    "></i></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['url' => 'mantenimiento/registro', 'method' => 'POST', 'autocomplete' => 'off', 'files' => 'true']) !!}
            {!! Form::token() !!}
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>medio<span class="text-danger" title="Campo obligatorio">*</span></label>
                                <div class="input-group a mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span
                                                class="fas fa-box-open fa-2x-x"></span></span>
                                    </div>
                                    <input type="text" class="form-control fi" id="medio" name="medio"
                                        placeholder="Ingrese medio" autocomplete="off"
                                        value="{{ old('medio') }}" required>
                                </div>
                                {!! $errors->first('medio', '<span class="help-block text-danger"><b>:message </b></span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>banco</label>
                                <div class="input-group a mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span
                                                class="fas fa-barcode fa-2x-x"></span></span>
                                    </div>
                                    <input type="text" class="form-control fi" id="banco" name="banco"
                                        placeholder="Ingrese banco" autocomplete="off"
                                        value="{{ old('banco ') }}">
                                </div>
                                {!! $errors->first('banco', '<span class="help-block text-danger"><b>:message </b></span>') !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Monto<span class="text-danger" title="Campo obligatorio">*</span></label>
                                <div class="input-group a mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span
                                                class="fas fa-money-bill fa-2x-x"></span></span>
                                    </div>
                                    <input type="text" class="form-control fi priceProducts" id="monto"
                                        name="monto" placeholder="monto" autocomplete="off"
                                        value="{{ old('monto') }}" required>

                                </div>
                                {!! $errors->first('monto', '<span class="help-block text-danger"><b>:message </b></span>') !!}
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seleccione Voucher</label>
                                <div class="input-group a mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span class="fas fa-image fa-2x-x"></span></span>
                                    </div>
                                    <input type="file" class="form-control fi " id="voucher" name="voucher" required>
                                </div>
                                {!! $errors->first('voucher', '<span class="help-block text-danger"><b>:message </b></span>') !!}
                            </div>
                            <div id="img" class="imagen"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seleccione administrado<span class="text-danger" title="Campo obligatorio">*</span></label>
                                <div class="input-group a mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span
                                                class="fas fa-box-open fa-2x-x"></span></span>
                                    </div>
                                    {{-- <select class="form-control fi selectpicker" name="promoterId " id="promoterId "  data-live-search="true" required> --}}
                                        <select name="promoterId" id="" class="form-control selectpicker" data-live-search="true">
                                        @foreach ($regis as $c)
                                            @if (old('promoterId') == $c->promoterId )
                                                <option value="{{ $c->promoterId  }}" selected>
                                                    {{ $c->nomPromoter }}
                                                </option>
                                            @else
                                                <option value="{{ $c->promoterId  }}"> {{ $c->nomPromoter }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                {!! $errors->first('nomPromoter', '<span class="help-block text-danger"><b>:message </b></span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seleccione Jugador<span class="text-danger" title="Campo obligatorio">*</span></label>
                                <div class="input-group a mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span
                                                class="fas fa-box-open fa-2x-x"></span></span>
                                    </div>
                                    
                                        <select name="playerId" id="" class="form-control selectpicker" data-live-search="true">
                                        @foreach ($regiss as $c)
                                            @if (old('playerId ') == $c->playerId )
                                                <option value="{{ $c->playerId  }}" selected>
                                                    {{ $c->nomPlayer }}
                                                </option>
                                            @else
                                                <option value="{{ $c->playerId  }}"> {{ $c->nomPlayer }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                {!! $errors->first('nomPlayer', '<span class="help-block text-danger"><b>:message </b></span>') !!}
                            </div>
                        </div>



                        {{-- <div class="form-group">
                        <label>Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion"
                                placeholder="Enter Description"  autocomplete="off">
                        <span id="e_descripcion" class="help-block text-danger"></span>
                    </div> --}}

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn text-dark" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-dark">Guardar</button>
        </div>
        {{ Form::Close() }}
    </div>
</div>@push('scripts')
<script>
  
    $('.priceProducts').on('input', function() {
        this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
    });
   
</script>
@endpush
</div>
