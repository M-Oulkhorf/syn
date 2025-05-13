@if (session()->has('success'))
    <x-alert type="success">
        {{ session('success') }}
    </x-alert>
@endif

@if (session()->has('error'))
    <x-alert type="danger">
        {{ session('error') }}
    </x-alert>
@endif

@if (session()->has('warning'))
    <x-alert type="warning">
        {{ session('warning') }}
    </x-alert>
@endif

@if (session()->has('info'))
    <x-alert type="info">
        {{ session('info') }}
    </x-alert>
@endif

@if ($errors->any())
    <x-alert type="danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-alert>
@endif
