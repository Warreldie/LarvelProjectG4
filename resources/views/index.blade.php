@extends('layouts/app')

@section('content')

<x-navigation/>
<section class="bg-home bg-cover pb-40">
@if(Session::has('message'))
  <div class="bg-green-400 text-center rounded text-white mb-5">
    <p>
    {{Session::get('message')}}
    </p>

    @php
    Session::forget('message');
    @endphp
    
  </div>
  @endif
    <!-- left side -->
    <div class="flex">

        <div class="mt-40 ml-32">
        <h1 class="font-headers font-semibold text-6xl text-h1">
            Together we can <br>
            help our seas recover
        </h1>
        <h3 class="text-h3 font-headers font-regular text-3xl mt-4">
            collect and trade
        </h3>
        <h2>Prize of 1ETH</h2>
            <ul>
                <li>USD: {{$response["USD"]}} $</li>
                <li>EUR: {{$response["EUR"]}} €</li>
                <li>BTC: {{$response["BTC"]}} BTC</li>
            </ul>
        <div class="mt-10 font-headers font-extralight text-2xl flex justify-around">
            <a class="rounded bg-white  py-0.5 px-8 text-regular shadow-md" href="">More info</a>
            <a class="rounded bg-white  py-0.5 px-8 text-regular shadow-md" href="">Register</a>
        </div>
        </div>


    </div>
    <!-- right side -->
    <div class="flex">

    </div>
</section>
<section class="flex justify-center">
    <div class="mt-10">
        <h2 class="font-headers font-semibold text-4xl">Featured</h2>
    </div>

</section>

@endsection
