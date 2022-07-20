@extends('layouts.admin')
@section('contenido')
<!-- CSS only -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span class="title_header">Listado de Registros</span>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @include('mantenimiento.registro.create')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('mantenimiento.registro.search')
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead style="background: #eaf3fa; color: #12446b">
                            <tr>
                                <th>Nro.</th>
                                <th>Jugador</th>
                                <th>Administrador</th>
                                <th>medio</th>
                                <th>monto</th>
                                <th>banco</th>
                                <th>voucher</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($cont = 1)
                            @foreach ($regi as $c)
                                <tr>
                                    <td>{{ $cont++ }}</td>
                                    <td>{{ $c->nomPlayer }}</td>
                                    <td>{{ $c->nomPromoter }}</td>
                                    <td>{{ $c->medio }}</td>
                                    <td>{{ $c->monto }}</td>
                                    <td>{{ $c->banco }}</td>
                                    <td>
                                        @php($nombre_fichero = public_path('voucher/' . $c->voucher))
                                            @if (file_exists($nombre_fichero) && !empty($c->voucher))
                                                <img 
                                                {{-- id="image"  onclick="openImg()" --}}
                                                src="{{ asset('voucher/' . $c->voucher) }}" height="70"
                                                    width="80" class="rounded">
                                            @else
                                                <img src="{{ asset('assets/img/img_alter.png') }}" alt="ejm" height="20"
                                                    width="20" class="rounded">
                                            @endif
                                    </td>
                                   
                                    <td align="center">
                                        <a class="btn btn-default text-info"
                                            href="{{ route('registro.edit', $c->registerId ) }}">
                                            <i class="far fa-edit text-info" title="EDITAR {{ $c->medio }} "></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('registro.destroy', $c->registerId ) }}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            <button class="btn btn-default borrar text-danger"
                                                title="ELIMINAR {{ $c->medio }}"
                                                data-nombre="{{ $c->medio }}"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                 
                    {{-- {{ $player->links() }} --}}
                    
                </div>

                <!-- /.card-body -->
            </div>
        </div>
    </div>

    @push('scripts')

    <script>
//         function openImg(){
//     var image = document.getElementById('image');
//     var source = image.src;
//     window.open(source);
// }
    </script>
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
