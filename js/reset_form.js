function resetForm() {
    var elements = document.querySelector('form').elements;
    for (let i = 0; i < elements.length; i++) {
      if (elements[i].type && elements[i].type === 'checkbox')
        elements[i].checked = false;
      else
        elements[i].value = "";
    }
}

