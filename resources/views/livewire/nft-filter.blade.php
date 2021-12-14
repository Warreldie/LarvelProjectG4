<div>
    <section class="flex font-headers border-12">
        <div id="sidebar-out" class=" w-1/12 hidden ml-5 pt-10">
            <a href="#"><img class="h-10 w-auto transform rotate-180 border-2 border-mainblue" src="{{ asset('./../images/arrow.png') }}" alt=""> </a>
        </div>
        <section id="sidebar" class="w-12/12 h-screen max-w-2xl">
            <p>
            <div class="flex justify-center border-2 border-mainblue pl-20 pt-5 pb-5">
                <img class="h-8" src="{{ asset('./../images/filter.png') }}" alt="">

                <h2 class="text-2xl ml-5">Filter</h2>
                <div class="ml-16">
                    <a href="#"><img id="sidebar-btn" class="h-8" src="{{ asset('./../images/arrow.png') }}" alt=""> </a>

                </div>

            </div>
            <div class="border-2 border-mainblue pt-5 pb-5" id="priceWrapper">
                <div class="flex justify-center">
                    <h2 class="text-2xl ml-5">Price</h2>
                </div>
                @if ($priceWarning === true)
                <p id="price-warning" class="bg-warningred px-1 py2 ">Min value cant be higher than max value!</p>
                @endif
                <div id="priceBars" class="text-center">
                    <div class="flex justify-center">
                        <h4 class="text-xl pt-10">min price</h4>
                    </div>
                    <p class=""><span>$1</span> <span class="ml-32">$10.000</span></p>
                    <input wire:model="minPrice" wire:change="checkPrice" value={{$minPrice}} type="range" min="1" max="10000" class="appearance-none w-3/4 h-1 bg-mainblue rounded slider-thumb" id="min-slider" />
                    <div class="flex justify-center">
                        <p class="px-0.5 py-3 bg-mainblue w-1/4 rounded-xl">$ <span id="min-val">{{$minPrice}}</span></p>
                    </div>

                    <div class="flex justify-center">
                        <h4 class="text-xl pt-5">max price</h4>
                    </div>
                    <div class="text-center">
                        <p class=""><span>$1</span> <span class="ml-32">$10.000</span></p>
                        <input wire:model="maxPrice" wire:change="checkPrice" value={{$maxPrice}} type="range" min="1" max="10000" class="appearance-none w-3/4 h-1 bg-mainblue rounded slider-thumb" id="max-slider" />
                        <div class="flex justify-center">
                            <p class="px-0.5 py-3 bg-mainblue w-1/4 rounded-xl">$ <span id="max-val">{{$maxPrice}}</span></p>
                        </div>
                        <a wire:click="filter" id="priceFilter" class="rounded bg-mainblue  py-0.5 px-8 text-regular shadow-md mt-5 ml-32" href="#">filter</a>

                    </div>
                </div>
            </div>


            <div class="border-2 border-mainblue pt-5 pb-5" id="CollectionWrapper">
                <div class="flex justify-center">
                    <h2 class="text-2xl">Collections</h2>
                </div>
                <form action="">
                    <div class="future-content-coll">
                        <input wire:click="filter" wire:model="collectionFilter" type="radio" id="allCollections" name="collectionFilter" value="all" checked>
                        <label wire:click="filter" for="allCollections">All</label><br>
                        @foreach ($collections as $collection)
                        <input wire:click="filter" wire:model="collectionFilter" type="radio" id="collection{{$collection->id}}" name="collectionFilter" value={{$collection->id}}>
                        <label for="collection{{$collection->id}}">{{$collection->title}}</label><br>
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="border-2 border-mainblue pt-5 pb-5" id="CatWrapper">
                <div class="flex justify-center">
                    <h2 class="text-2xl">Categories</h2>
                </div>
                <form action="">
                    <div class="future-content-cat">
                        <input wire:click="filter" wire:model="categoryFilter" type="radio" id="allCategories" name="categoryFilter" value="all" checked>
                        <label for="allCollections">All</label><br>
                        @foreach ($categories as $category)
                        <input wire:click="filter" wire:model="categoryFilter" type="radio" id="category{{$category->id}}" name="categoryFilter" value={{$category->id}}>
                        <label for="category{{$category->id}}">{{$category->name}}</label><br>
                        @endforeach
                    </div>
                </form>
        </section>



        <section class="">
        <div class="flex justify-center pt-5 fixed left-0 right-0 ">
             <div class="border-2 border-mainblue rounded pl-5 pr-5 pt-1 filter shadow-md max-w-8xl">
                    <input wire:keyup="search" wire:model="search" type="text"  class="outline-none" placeholder="Search..." size="40">
                    <button type="submit" class="">
                        <img class="w-4" src="{{ asset('./../images/search.png') }}" alt="search">
                    </button>
                    </div>
             </div>
            <div class="flex flex-row flex-wrap h-screen">
                @foreach ($nfts as $nft)
                <div class="bg-white m-10 px-20 py-10 rounded-xl shadow-xl max-h-60">
                    <div class="text-center">
                        <div class="flex justify-center">
                            <img class="w-32" src="https://gateway.pinata.cloud/ipfs/{{$nft->picture}}" alt="logo">
                        </div>
                        <h1 class="font-headers text-base text-xl z-20"><a href="/nfts/{{ $nft->id }}">{{ $nft->name }}</h1>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

    </section>
</div>