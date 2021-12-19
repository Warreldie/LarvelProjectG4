@extends('layouts/market')

@section('content')
<section>
    <x-navigation />

    <livewire:nft-filter :collections="$collections" />

</section>
@endsection
@livewireScripts
<script src="{{ asset('js/nav-dropdown.js') }}"></script>
<script src="{{ asset('js/sliders.js') }}"></script>
<script src="{{ asset('js/sidebar-market.js') }}"></script>

@livewireScripts
</body>

</html>