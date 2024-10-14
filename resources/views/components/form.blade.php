<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    {{ $slot }}
</form>
