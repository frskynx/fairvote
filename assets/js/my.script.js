document.getElementById("pasteButton").addEventListener("click", function() {
    navigator.clipboard.readText().then(function(clipboardText) {
        var inputElement = document.getElementById("code");
        inputElement.value = clipboardText;
    }).catch(function(err) {
        console.error('Gagal membaca teks dari clipboard: ', err);
    });
});

function copyToClipboard(i) {
    var text = document.getElementById("textToCopy"+i).value;
    var tempInput = document.createElement("input");
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    
    alert("Share Code telah disalin: " + text);
}