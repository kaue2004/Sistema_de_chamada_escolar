<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
function saveTextAsFile() {
  var textToWrite = document.getElementById("Salvar texto").value;
  var textFileAsBlob = new Blob([textToWrite], {
    type: 'text/plain'
  });
  var fileNameToSaveAs = document.getElementById("Salvarnome").value;

  var downloadLink = document.createElement("a");
  downloadLink.download = fileNameToSaveAs;
  downloadLink.innerHTML = "Download File";
  if (window.webkitURL != null) {
    // Chrome allows the link to be clicked
    // without actually adding it to the DOM.
    downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
  } else {
    // Firefox requires the link to be added to the DOM
    // before it can be clicked.
    downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
    downloadLink.onclick = destroyClickedElement;
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
  }

  downloadLink.click();
}

function destroyClickedElement(event) {
  document.body.removeChild(event.target);
}

</script>
<body>
<table>
    <tr>
      <td>Nome dos Alunos</td>
    </tr>
    <tr>
      <td colspan="3">
        <textarea id="Salvar texto" style="width:512px;height:256px"></textarea>
      </td>
    </tr>
    <tr>
      <td>Turma: </td>
      <td>
        <input id="Salvarnome"></input>
      </td>
      <td>
        <button onclick="saveTextAsFile()">Salvar</button>
      </td>
    </tr>
   
  </table>
</body>
</html>