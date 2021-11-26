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

//collection
document.querySelector("#collectionDrDown").addEventListener("click", function(){
    let colArrow = document.querySelector("#collectionArrow");
    let colBars = document.querySelector(".future-content-coll");

    if(colBars.classList.contains("hidden")){
        colBars.classList.remove("hidden");
        colArrow.classList.add("rotate-180");
    }
    else{
        colBars.classList.add("hidden");
        colArrow.classList.remove("rotate-180");
    }
})
//catgories

document.querySelector("#catDrDown").addEventListener("click", function(){
    let catArrow = document.querySelector("#catArrow");
    let catBars = document.querySelector(".future-content-cat");

    if(catBars.classList.contains("hidden")){
        catBars.classList.remove("hidden");
        catArrow.classList.add("rotate-180");
    }
    else{
        catBars.classList.add("hidden");
        catArrow.classList.remove("rotate-180");
    }
})