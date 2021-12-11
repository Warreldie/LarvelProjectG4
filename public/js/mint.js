function myFunction() {
    var owner = 5
    var session = 5
    var x = document.getElementById("mintbutton");
    var y = document.getElementById("mintdisable");
    if (owner === session) {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "block";
    }
}
