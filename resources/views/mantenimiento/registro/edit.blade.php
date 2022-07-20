@extends('layouts.admin')
@section('contenido')
    <style>
        .imagen img {
            background: #f8eded;
            width: 100px;
            height: auto;
        }

    </style>
    {!! Form::open(['url' => route('registro.update', $regi->registerId), 'method' => 'PUT', 'autocomplete' => 'off', 'files' => true]) !!}
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="modal-title title_header" id="exampleModalLongTitle">
                        Editar Registro
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group a mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fas fa-signature fa-2x-x"></span><span
                                                        class="tooltiptext">Ingrese medio
                                                    </span></span>
                                            </div>
                                            {{-- Código de Usuario para que función el unique de los campos --}}
                                            <input type="hidden" name="registerId" id=""
                                                value="{{ $regi->registerId }}">
                                            <input type="text"
                                                class="form-control fi {{ $errors->has('medio') ? 'is-invalid' : '' }}"
                                                id="medio" name="medio" placeholder="Nombres" @if (empty(old('medio')))
                                            value="{{ $regi->medio }}"
                                        @else
                                            value="{{ old('medio') }}" @endif>
                                        </div>
                                        @if ($errors->has('medio'))
                                            <div>
                                                <span class="text-danger">{{ $errors->first('medio') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group a mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fas fa-dollar-sign fa-2x-x"></span><span
                                                        class="tooltiptext">Ingrese banco
                                                    </span></span>
                                            </div>
                                            {{-- Código de Usuario para que función el unique de los campos --}}
                                           
                                            <input type="text"
                                                class="form-control fi {{ $errors->has('banco') ? 'is-invalid' : '' }}"
                                                id="banco" name="banco" placeholder="banco" @if (empty(old('banco'))) value="{{ $regi->banco }}"
                                        @else
                                            value="{{ old('banco') }}" @endif>
                                        </div>
                                        @if ($errors->has('banco'))
                                            <div>
                                                <span class="text-danger">{{ $errors->first('banco') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group a mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class=" fas fa-box-open fa-2x-x"></span><span
                                                        class="tooltiptext">Ingrese monto
                                                    </span></span>
                                            </div>
                                            {{-- Código de Usuario para que función el unique de los campos --}}
                                           
                                            <input type="text"
                                                class="form-control fi {{ $errors->has('monto') ? 'is-invalid' : '' }}"
                                                id="monto" name="monto" placeholder="monto" @if (empty(old('monto'))) value="{{ $regi->monto }}"
                                        @else
                                            value="{{ old('monto') }}" @endif>
                                        </div>
                                        @if ($errors->has('monto'))
                                            <div>
                                                <span class="text-danger">{{ $errors->first('monto') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group a mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-box fa-2x-x"></i><span
                                                    class="tooltiptext">Seleccione administrador</span></span>
                                        </div>
                                        <select class="custom-select" name="playerId">
                                            @foreach ($regiss as $c)
                                                @if ($c->playerId == old('playerId'))
                                                    <option value="{{ $c->playerId}}"selected>{{ $c->nomPlayer }}</option>
                                                @elseif ($c->playerId == $regi->playerId )
                                                    <option value="{{ $c->playerId}}"selected>{{ $c->nomPlayer }}</option>
                                                @else
                                                    <option value="{{ $c->playerId}}" >{{ $c->nomPlayer }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group a mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-box fa-2x-x"></i><span
                                                    class="tooltiptext">Seleccione administrador</span></span>
                                        </div>
                                        <select class="custom-select" name="promoterId">
                                            @foreach ($regis as $c)
                                                @if ($c->promoterId == old('promoterId'))
                                                    <option value="{{ $c->promoterId}}"selected>{{ $c->nomPromoter }}</option>
                                                @elseif ($c->promoterId == $regi->promoterId )
                                                    <option value="{{ $c->promoterId}}"selected>{{ $c->nomPromoter }}</option>
                                                @else
                                                    <option value="{{ $c->promoterId}}" >{{ $c->nomPromoter }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

        
                            
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group a mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-image fa-2x-x"></i><span
                                                        class="tooltiptext">Seleccione Imagen</span></span>
                                            </div>
                                            <input type="file" class="form-control " id="Imagen" name="voucher">
                                        </div>
                                        @if ($errors->has('voucher'))
                                            <div>
                                                <span class="text-danger">{{ $errors->first('voucher') }}</span>
                                            </div>
                                        @endif
                                        <div id="img2" class="voucher ">
                                            <img src="{{ asset('voucher/' . $regi->voucher) }}" width="100"
                                                height="100">

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-center">
                    <div style="margin: 0px auto 0px auto">
                        <div style="margin: 0px auto 0px auto">
                            <a href="{{ route('registro.index') }}" type="button" class="btn btn-danger ">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ Form::close() }}
    <script>
        document.getElementById("Imagen").onchange = function(e) {
            console.log("das");
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();

            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);

            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function() {
                let preview = document.getElementById('img2'),
                    image = document.createElement('img');
                console.log("mostrado")
                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }
    </script>
@endsection
