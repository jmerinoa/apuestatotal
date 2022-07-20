@extends ('layouts.admin')
@section('contenido')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    {{-- <span class="title_header">Detalle de recargas # {{$recargas->email}}  de <span style="color: #353b41"></span></span> --}}

                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Simple Tables</li> --}}
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    {{-- <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <p>{{ $venta->nombres }}</p>

            </div>


        </div>
    </div> --}}

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead class="bg-teal">
                            <th>registro</th>
                            <th>monto</th>
                            <th>banco</th>
                            <th>medio</th>
                            <th>fecha de recarga</th>
                            <th>fecha recarga editada</th>

                        </thead>

                        <tbody>
                            @php($count = 1)
                            @php($counts = 0)
                            @foreach ($recargas as $det)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $det->monto }}</td>
                                    <td>{{ $det->banco }}</td>
                                    <td>{{ $det->medio }}</td>
                                    <td>{{ $det->horaFechaRegister_at }}</td>
                                    <td>{{ $det->horaFechaRegisterdate_up }}</td>
                                    @php($counts += $det->monto)
                                </tr>
                            @endforeach
                            <th>Toltal recargado</th>
                            <td>{{ $counts }}</td>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <a href="{{ url()->previous() }}" class="btn btn-danger">VOLVER ATRAS</a>
        </div>
    </div>
@endsection


