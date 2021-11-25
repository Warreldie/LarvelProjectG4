document.querySelector("#sidebar-btn").addEventListener("click", function(){
   let sidebar = document.querySelector("#sidebar")
    let sideOut = document.querySelector("#sidebar-out")

    sidebar.classList.add("hidden");
    sideOut.classList.remove("hidden");

    sideOut.addEventListener("click", function(){
        sidebar.classList.remove("hidden");
        sideOut.classList.add("hidden");
    });
})

//price up/down

document.querySelector("#priceDrDown").addEventListener("click", function(){
    let priceBars = document.querySelector("#priceBars");
    let priceArrow = document.querySelector("#priceArrow");

    if(priceBars.classList.contains("hidden")){
        priceBars.classList.remove("hidden");
        priceArrow.classList.add("rotate-180");
    }
    else{
        priceBars.classList.add("hidden");
        priceArrow.classList.remove("rotate-180");
    }
})