{!! Form::open(['url' => 'mantenimiento/registro', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search']) !!}
<div class="card-header">
    <h3 class="card-title" >
        <a class="btn btn-success btn-sm" href="" data-target="#modal-add" data-toggle="modal">
            Nuevo <i class="fas fa-plus-circle" style="color: #cef5e1; margin-left: 10px"></i>
        </a>
    </h3>
    <div class="card-tools">
        <div class="input-group input-group-sm" >
            <input type="text" name="searchText" class="form-control float-right" value="{{$searchText}}">
            {{-- <input type="date" name="searchText2" class="form-control float-right" value="{{$searchText2}}"> --}}
            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
<script>
    document.getElementById("voucher").onchange = function(e) {
        // Creamos el objeto de la clase FileReader
        let reader = new FileReader();

        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(e.target.files[0]);

        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function() {
            let preview = document.getElementById('img'),
                image = document.createElement('img');

            image.src = reader.result;

            preview.innerHTML = '';
            preview.append(image);
        };
    }
</script>