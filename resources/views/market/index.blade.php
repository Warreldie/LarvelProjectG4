@extends('layouts/market')

@section('content')
<section>
    <x-navigation />
    <div class="flex justify-center pt-5">
    <div class="border-2 border-mainblue rounded pl-5 pr-5 pt-1 filter shadow-md max-w-8xl">
                    <input type="text"  class="outline-none" placeholder="Search..." size="40">
                    <button type="submit" class="">
                        <img class="w-4" src="{{ asset('./../images/search.png') }}" alt="search">
                    </button>
                    </div>
    </div>
    <livewire:nft-filter :collections="$collections" />

</section>
@endsection
@livewireScripts

</html>