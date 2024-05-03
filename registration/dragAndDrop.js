var dropZone = document.getElementById('drop_zone');

dropZone.ondragover = function() {
    this.style.backgroundColor = '#ccc';
    return false;
};

dropZone.ondragleave = function() {
    this.style.backgroundColor = '#fff';
    return false;
};

dropZone.ondrop = function(e) {
    e.preventDefault();
    this.style.backgroundColor = '#fff';

    var files = e.dataTransfer.files; // Array of all files

    for (var i=0, file; file=files[i]; i++) {
        var fileName = document.createTextNode(file.name);
        dropZone.innerHTML = ''; // clear the drop zone
        dropZone.appendChild(fileName); // append the file name to the drop zone

        var reader = new FileReader();

        reader.onloadend = function(e) {
            var dataURL = e.target.result;
            document.getElementById('company_logo').value = dataURL;
        };

        reader.readAsDataURL(file);
    }
};