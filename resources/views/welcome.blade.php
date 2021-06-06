<x-app-layout>
    @if (session('mensaje'))
    <script>
        $('#alert').fadeIn();
        setTimeout(function() {
            $("#alert").fadeOut();
        },1000);
    </script>
    <div id="alert" class="alert alert-danger" style="width: 100%">
        <strong>{{session('mensaje')}}</strong>
    </div>
    @endif
</x-app-layout>
