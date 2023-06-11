function postData() {
  let form = document.querySelector('form');
  let data = new FormData(form);
  let request = new XMLHttpRequest();
  let articleName = document.getElementById("name").value;
  let quantity = document.getElementById("quantity").value;


  request.addEventListener('load', function (event) {
    let  msg,icon;
    let text = JSON.parse(request.responseText);

    if (request.status >= 200 && request.status < 300) {
      
      if("success" == text.msg){
        msg="Eine Menge von: " + quantity + " des Artikels:" + articleName +" wurde eingetragen.";
        icon="success";
      }else{
        msg = "Es ist ein Fehler aufgetreten";
        icon ="error";
      }

      Swal.fire({ icon: icon, title: '', text: msg, showConfirmButton: true });
      setTimeout(function () {
        window.location.href = '../vue/ean.php';
      }, 3000
      );
    }
    else {
      console.warn(request.statusText, request.responseText);
    }
  });
  request.open("POST", "../php/save/stock.php");
  request.send(data);
}

document.querySelector("form").addEventListener('submit', function (event) {
  /**
   * La méthode preventDefault() annule l'événement s'il est annulable, ce qui signifie que l'action par défaut qui appartient à l'événement ne se produira pas.
   * Dans ce cas en cliquant sur le bouton "Soumettre", on empêche de soumettre le formulaire
   */
  event.preventDefault();
  postData();
});

