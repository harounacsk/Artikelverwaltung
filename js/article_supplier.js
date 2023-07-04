function postData() {
  let form = document.querySelector('form');
  let data = new FormData(form);
  let request = new XMLHttpRequest();
  let msg,icon;
  request.addEventListener('load', function (event) {
    let text = JSON.parse(request.responseText);

    switch (text.msg) {
      case "added":
        msg = "Ein neuer Preis ist hinzugefügt";
        icon="succes";
        break;
      case "updated":
        msg = "Der Preis wurde geändert.";
        icon="succes";
        break;    
      case "error_duplicata":
        msg = "Für jeden Artikel kann der Lieferant höchstens einen Preis anbieten.";
        icon="error";
        break;
      default:
        msg = "Ein Fehler ist aufgetreten.";
        icon="error";
        break;
    }
    
    if (request.status >= 200 && request.status < 300) {
      Swal.fire({ icon: icon, title: "", text: msg, showConfirmButton: true });
      resetForm();
    }
    else 
      console.warn(request.statusText, request.responseText.msg);
  });
  request.open("POST", "../php/save/article_supplier.php");
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

