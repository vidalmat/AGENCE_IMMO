var carousel = document.querySelector('.carousel');
var images = [
  {nom: "appartement.jpg", alt:"", desc:""},
  {nom: "appartement2.jpg", alt:"", desc:""},
  {nom: "appartement3.jpg", alt:"", desc:""},
  {nom: "appartement4.jpg", alt:"", desc:""},
];

var html = "";

for(image of images) {
  html += "<div class='item' id='it" + images.indexOf(image) + "'>";
  html += "<img src='images/page2/" + image.nom + "' alt='" + image.alt + "'>";
  html += "</div>"
}

carousel.innerHTML = html;

// -- Réglage des propriétés en fonction du nombre d'images -------

/* Distance p/p à l'origine */
var distanceZ = 36; // 8 => 35, 9 => 36, 10 => 37, 11 => 38

/* Largeur des images */
var itemWidth = 25; // 8 => 28vw, 9 => 25vw, 10 => 23vw, 11 => 22

var deg = 360/images.length;
var items = Array.from(document.querySelectorAll(".item"));

for(item of items) {
  item.style.width = itemWidth + "vw";
  item.style.height = "calc(" + itemWidth + "vw * 9/16)";
  item.style.left = (70 - itemWidth)/2 + "vw";
  item.style.transform = "rotateY(calc((360deg/" + items.length + ")*" + items.indexOf(item) + ")) translateZ(calc(" + distanceZ + "vw))"
}

// -------- Animation du carousel -------

var position = 0;
var rotation = true;

function rotate(direction) {
  position += direction;
  carousel.style.transform = "rotateY(" + position + "deg)"
}

function auto() {
  setTimeout(function () {
    if(rotation) {
      rotate(-deg);
    }
    auto();
  }, 3000);
}

auto();

// -------- Ajout des Listeners -------

var prev = document.querySelector('.prev');
var next = document.querySelector('.next');

carousel.addEventListener("mouseover", function () {
  rotation = false;
});
carousel.addEventListener("mouseout", function () {
  rotation = true;
});
prev.addEventListener("mouseover", function () {
  rotation = false;
});
prev.addEventListener("mouseout", function () {
  rotation = true;
});
next.addEventListener("mouseover", function () {
  rotation = false;
});
next.addEventListener("mouseout", function () {
  rotation = true;
});

prev.addEventListener("click", function () {
    rotate(deg);
});

next.addEventListener("click", function () {
    rotate(-deg);
});



var items = document.getElementsByClassName("items");
for(var it of items) {
  it.addEventListener("click", function(e) {

    console.log(e.target);
    var modale = document.getElementById("modale");
    modale.style.display = "block";
    modale.appendChild(e.target);
  })
}