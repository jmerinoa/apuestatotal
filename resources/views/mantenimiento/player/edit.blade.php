@extends('layouts.admin')
@section('contenido')
    {!! Form::open([
        'url' => route('player.update', $player->playerId),
        'method' => 'PUT',
        'autocomplete' => 'off',
        'files' => true,
    ]) !!}
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="modal-title title_header font-weight-bold" id="exampleModalLongTitle">
                        Editar Jugador
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre<span class="text-danger" title="Campo obligatorio">*</span></label>
                                        <div class="input-group a mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fas fa-box-open fa-2x-x"></span>
                                            </div>
                                            <input type="hidden" name="playerId" id="playerId"
                                                value="{{ $player->playerId }}">
                                            <input type="text"
                                                class="form-control fi {{ $errors->has('nomPlayer') ? 'is-invalid' : '' }}"
                                                name="nomPlayer" placeholder=""
                                                @if (empty(old('nomPlayer'))) value="{{ $player->nomPlayer }}"
                                             @else
                                                                             value="{{ old('nomPlayer') }}" @endif
                                                required>
                                        </div>
                                        @if ($errors->has('nomPlayer'))
                                            <div>
                                                <span class="text-danger">{{ $errors->first('nomPlayer') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Email<span class="text-danger" title="Campo obligatorio">*</span></label>
                                        <div class="input-group a mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fas fa-box-open fa-2x-x"></span>
                                            </div>
                                            <input type="text"
                                                class="form-control fi {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                name="email" placeholder=""
                                                @if (empty(old('email'))) value="{{ $player->email }}"
                                             @else
                                                                             value="{{ old('email') }}" @endif
                                                required>
                                        </div>
                                        @if ($errors->has('email'))
                                            <div>
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <div style="margin: 0px auto 0px auto">
                            <div style="margin: 0px auto 0px auto">
                                <a href="{{ route('player.index') }}" type="button"
                                    class="btn btn-danger ">Cancelar</a>
                                <button type="submit" class="btn btn-dark text-white">Modificar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
