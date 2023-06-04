function postData() {
  let form = document.querySelector('form');
  let data = new FormData(form);
  let request = new XMLHttpRequest();
  let articleName = document.getElementById("name").value;

  request.addEventListener('load', function (event) {
    let text = JSON.parse(request.responseText);
    let msg;
    
    if("added" == text.msg)
      msg = "Der Artikel "+ articleName+ "  wurde hinzugefügt";
    else if("updated" == text.msg)
      msg="Die Daten der Artikels wurden geändert";
    else
      msg=" Ein Fehler ist aufgetreten";
    
    if (request.status >= 200 && request.status < 300) {
      Swal.fire({
        icon: 'success',
        title: '',
        text: msg,
        showConfirmButton: true
      });
      console.log(articleName);
      resetForm();

    }
    else {
      console.warn(request.statusText, request.responseText);
    }
  });
  request.open("POST", "../php/save/article.php");
  request.send(data);
}

document.querySelector("form").addEventListener('submit', function (event) {
  /**
   * La méthode preventDefault() annule l'événement s'il est annulable, ce qui signifie que l'action par défaut qui appartient à l'événement ne se produira pas.
   * Dans ce cas en cliquant sur le bouton "Soumettre", on empêche de soumettre le formulaire
   */
  event.preventDefault();
  postData();
  resetForm();
});

