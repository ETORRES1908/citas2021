@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

@stop

@section('js')
<script>
    console.log('Hola!');
</script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('#doctores').DataTable(
    {
        "responsive":true,
        "auto-with":false,
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
        /* FORMULARIO ELIMINAR DOCTOR */
        $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
            Swal.fire({
            title: '¿Estas seguro?',
            text: "Se eliminaran todos los registros relacionados a este Doctor. Esta acción es irreversible.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, estoy de acuerdo!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
    });
</script>
{{-- MENSAJE DESPUES DE ELIMINAR --}}
@if (session("mensaje")=="ok")
<script>
    Swal.fire(
                'Eliminado!',
                'El doctor fue eliminado correctamente.',
                'success'
                )
</script>
@endif
@stop
