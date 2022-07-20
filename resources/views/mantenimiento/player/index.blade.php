@extends('layouts.admin')
@section('contenido')
<!-- CSS only -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span class="title_header">Listado de Player</span>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @include('mantenimiento.player.create')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('mantenimiento.player.search')
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead style="background: #eaf3fa; color: #12446b">
                            <tr>
                                <th>Nro.</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($cont = 1)
                            @foreach ($player as $c)
                                <tr>
                                    <td>{{ $cont++ }}</td>
                                    <td>{{ $c->nomPlayer }}</td>
                                    <td>{{ $c->email }}</td>
                                    <td align="center">
                                        <a class="btn btn-default text-info"
                                            href="{{ route('player.edit', $c->playerId) }}">
                                            <i class="far fa-edit text-info" title="EDITAR {{ $c->nomPlayer }} "></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('player.destroy', $c->playerId) }}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            <button class="btn btn-default borrar text-danger"
                                                title="ELIMINAR {{ $c->nomPlayer }}"
                                                data-nombre="{{ $c->nomPlayer }}"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    <td align="center">
                                        <a class="btn btn-default text-teal btn-sm" title="Mostrar más detalles" href="{{route('player.show',$c->playerId)}}">
                                            <i class="fas fa-clipboard-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                 
                    {{ $player->links() }}
                    
                </div>

                <!-- /.card-body -->
            </div>
        </div>
    </div>

    @push('scripts')
        @if (count($errors) > 0)
            <script>
                $(document).ready(function() {
                    Snackbar.show({
                        text: 'Registre de forma correcta los campos.',
                        actionText: 'CERRAR',
                        pos: 'bottom-right',
                        duration: 5000
                    });
                    $('#modal-add').modal('show');
                });
            </script>
        @endif

        @if (Session::has('success'))
            <script type="text/javascript">
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                Toast.fire({
                    icon: 'success',
                    html: '<h4>' + 'Operación completada' + '</h4>' + '<span>' + '{{ Session::get('success') }}' +
                        '</span>' + '<br>' +
                        '<span style="color: #49A761;"><b>' + ' correctamente.' + '</b></span>',
                    customClass: 'swal-pop',
                })
            </script>
        @elseif(Session::has('error'))
            <script type="text/javascript">
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                Toast.fire({
                    icon: 'error',
                    html: '<h4>Ocurrio un error</h4>' + '<span>' + '{{ Session::get('error') }}' + '</span>',
                    customClass: 'swal-pop',
                })
            </script>
        @endif
    @endpush
@endsection
