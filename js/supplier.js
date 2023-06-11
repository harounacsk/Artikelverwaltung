function postData() {
  let form = document.querySelector('form');
  let data = new FormData(form);
  let request = new XMLHttpRequest();
  let supplierName = document.getElementById("name").value;

  request.addEventListener('load', function (event) {
    let msg,icon = "";
    let text = JSON.parse(request.responseText);

    if (request.status >= 200 && request.status < 300) {
      switch (text.msg) {
        case "added":
          msg = "Der Lieferant: " + supplierName + " wurde hinzugefügt.";
          icon="success";
          break;
        case "updated":
          msg = "Die Daten des Lieferanten wurden geändert";
          icon="success";
          break;
        default:
          msg="Ein Fehler ist aufgetreten.";
          icon="error";
          break;
      }
      Swal.fire({ icon: icon, title: '', text: msg, showConfirmButton: true });
      resetForm();
    }
    else
      console.warn(request.statusText, request.responseText);

  });
  request.open("POST", "../php/save/supplier.php");
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

