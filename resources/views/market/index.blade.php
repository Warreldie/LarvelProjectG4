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
        <section class="w-5/12"> <p>
            <div class="flex justify-center border-2 border-mainblue pl-20 pt-5 pb-5"> 
                <img class="h-8" src="{{ asset('./../images/filter.png') }}" alt="">  
            
                <h2 class="text-2xl ml-5">Filter</h2>
                <div class="ml-16">
                <img class="h-8" src="{{ asset('./../images/arrow.png') }}" alt=""> 
                </div>
                
            </div>
            <div class="border-2 border-mainblue pl-10 pt-5 pb-5" id="priceWrapper">
            <div class="flex justify-center ">
            <h2 class="text-2xl ml-5">Price</h2>
                <div class="ml-10">
                <img class="h-8 transform -rotate-90" src="{{ asset('./../images/arrow.png') }}" alt=""> 
                </div>
            </div>
           
            
            <div></div>
            <div></div>
            <div></div>
        </p></section>
        <section>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, quos? Illum incidunt recusandae numquam sit asperiores exercitationem corporis? Amet perferendis in esse! Incidunt aliquam quidem consequuntur perspiciatis, eaque laboriosam alias.
                Inventore nam cupiditate, impedit cumque doloremque ex repellendus, culpa odit voluptatibus nesciunt laborum fugiat fugit eius pariatur? Numquam culpa illum, recusandae modi, vero sequi dolore rerum, ad necessitatibus accusamus omnis?
            </p>
        </section>

    </section>
</body>
</html>