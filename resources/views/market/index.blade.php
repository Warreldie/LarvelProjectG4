@extends('layouts/market')

@section('content')
<section>
    <x-navigation />
  
    <livewire:nft-filter :collections="$collections" />

</section>
@endsection
@livewireScripts

</html>