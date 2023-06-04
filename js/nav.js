
/**
 * 
 */
function respClass() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
/**
 * *Klasse "currentlink"  an dem aktuellen besuchten a-Element(Link) hinzufügen
 */
function addClass() {
  let allLink = document.getElementsByClassName("nav_a");
  for (var i = 0; i < allLink.length; i++) {
    //if(allLink[i].href == window.location.href){
    if (window.location.href.includes(allLink[i].href)) {
      allLink[i].classList.add("currentlink");

    }
  }
}

/**
 * DOMContentLoaded – le navigateur a complètement chargé le HTML,
 * mais les ressources externes telles que les images <img> et les feuilles de style peuvent ne pas être encore chargées.
 * load – non seulement le HTML est chargé, mais également toutes les ressources externes : images, styles, 
 */
document.addEventListener("DOMContentLoaded", (event) => { 
  window.addEventListener("load", addClass);
  document.getElementById("resp").addEventListener("click", respClass);
});