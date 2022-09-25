function charactersCount() {
  if (document.getElementById("message").value.length < 201) {
    document.getElementById("counter").innerHTML = 200 - document.getElementById("message").value.length;
  }

  if (document.getElementById("message").value.length == 200) {
    alert("Atingiu o valor máximo de caracteres.");
  }
}
