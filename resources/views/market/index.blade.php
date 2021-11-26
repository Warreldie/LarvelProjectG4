<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap" rel="stylesheet">
    <title>Market</title>
</head>
<body>
    <x-navigation/>

    <section class="flex font-headers">
        <div id="sidebar-out" class=" w-1/12 hidden ml-5 pt-10">
        <a href="#"><img class="h-10 w-auto transform rotate-180 border-2 border-mainblue" src="{{ asset('./../images/arrow.png') }}" alt="">  </a>
        </div>
        <section id="sidebar" class="w-5/12 h-screen"> <p>
            <div class="flex justify-center border-2 border-mainblue pl-20 pt-5 pb-5"> 
                <img class="h-8" src="{{ asset('./../images/filter.png') }}" alt="">  
            
                <h2 class="text-2xl ml-5">Filter</h2>
                <div class="ml-16">
                    <a href="#"><img id="sidebar-btn" class="h-8" src="{{ asset('./../images/arrow.png') }}" alt=""> </a>
                
                </div>
                
            </div>
            <div class="border-2 border-mainblue pt-5 pb-5" id="priceWrapper">
            <div class="flex justify-center pl-10 ">
            <h2 class="text-2xl ml-5">Price</h2>
                <div class="ml-10">
                <a id="priceDrDown" href="#"><img id="priceArrow" class="h-8 transform" src="{{ asset('./../images/arrow-down.png') }}" alt=""> </a>
                </div>
            </div>
            <p id="price-warning" class="bg-warningred hidden px-1 py2 "></p>

            <div id="priceBars" class="text-center hidden">
            <div class="flex justify-center">
            <h4 class="text-xl pt-10">min price</h4>
            </div>
            <p class=""><span>$1</span> <span class="ml-32">$10.000</span></p>
            <input type="range" value="1" min="1" max="10000" class="appearance-none w-3/4 h-1 bg-mainblue rounded slider-thumb" id="min-slider" />
            <div class="flex justify-center">
            <p class="px-0.5 py-3 bg-mainblue w-1/4 rounded-xl">$ <span id="min-val"></span></p>
            </div>

            <div class="flex justify-center">
            <h4 class="text-xl pt-5">max price</h4>
            </div>
            <div class="text-center">
            <p class=""><span>$1</span> <span class="ml-32">$10.000</span></p>
            <input type="range" value="1" min="1" max="10000" class="appearance-none w-3/4 h-1 bg-mainblue rounded slider-thumb" id="max-slider" />
            <div class="flex justify-center">
            <p class="px-0.5 py-3 bg-mainblue w-1/4 rounded-xl">$ <span id="max-val"></span></p>
            </div>
            <a id="priceFilter" class="rounded bg-mainblue  py-0.5 px-8 text-regular shadow-md mt-5 ml-32" href="#">filter</a>

        </div>
        </div>
</div>

            
        <div class="border-2 border-mainblue pt-5 pb-5" id="CollectionWrapper">
            <div class="flex justify-center pl-10 ">
            <h2 class="text-2xl">Collections</h2>
                <div class="ml-4">
                <a id="collectionDrDown" href="#"><img id="collectionArrow" class="h-8 transform" src="{{ asset('./../images/arrow-down.png') }}" alt=""> </a>
                </div>

            </div>
            <div class="future-content-coll hidden">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, explicabo. Ipsa eligendi at placeat blanditiis deleniti pariatur unde voluptatum vero rerum aliquam? Fugiat tempora dolorum consectetur perspiciatis quas ad magnam?</p>
                </div>
            
</div>
                <div class="border-2 border-mainblue pt-5 pb-5" id="CatWrapper">
            <div class="flex justify-center pl-10 ">
            <h2 class="text-2xl">Categories</h2>
                <div class="ml-4">
                <a id="catDrDown" href="#"><img id="catArrow" class="h-8 transform" src="{{ asset('./../images/arrow-down.png') }}" alt=""> </a>
                </div>

            </div>
            <div class="future-content-cat hidden">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, explicabo. Ipsa eligendi at placeat blanditiis deleniti pariatur unde voluptatum vero rerum aliquam? Fugiat tempora dolorum consectetur perspiciatis quas ad magnam?</p>
                </div>
        </section>
        <section>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, quos? Illum incidunt recusandae numquam sit asperiores exercitationem corporis? Amet perferendis in esse! Incidunt aliquam quidem consequuntur perspiciatis, eaque laboriosam alias.
                Inventore nam cupiditate, impedit cumque doloremque ex repellendus, culpa odit voluptatibus nesciunt laborum fugiat fugit eius pariatur? Numquam culpa illum, recusandae modi, vero sequi dolore rerum, ad necessitatibus accusamus omnis?
            </p>
        </section>

    </section>

    <script src="{{ asset('js/nav-dropdown.js') }}"></script>
    <script src="{{ asset('js/sliders.js') }}"></script>
    <script src="{{ asset('js/sidebar-market.js') }}"></script>

</body>
</html>