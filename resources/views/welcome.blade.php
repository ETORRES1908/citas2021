<x-app-layout>

</x-app-layout>

@if (session('mensaje'))
<div class="alert alert-danger">
    <strong>{{session('mensaje')}}</strong>
</div>
@endif
