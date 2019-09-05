// function showFileSize() {
function verified() {
    var input, file;
    // (Can't use `typeof FileReader === "function"` because apparently
    // it comes back as "object" on some browsers. So just see if it's there
    // at all.)
    if (!window.FileReader) {
        document.bodyAppend("p", "The file API isn't supported on this browser yet.");
        return 0;
    }

    input = document.getElementById('fileToUpload');
    if (!input) {
        alert("Um, couldn't find the fileToUpload element.");
        // document.bodyAppend("p", "Um, couldn't find the fileToUpload element.");
        return 0;
    }
    else if (!input.files) {
        alert("This browser doesn't seem to support the `files` property of file inputs.");
        // document.bodyAppend("p", "This browser doesn't seem to support the `files` property of file inputs.");
        return 0;
    }
    else if (!input.files[0]) {
        alert("Please select a file before clicking 'Load'");
        // document.bodyAppend("p", "Please select a file before clicking 'Load'");
        return 0;
    }
    else {
        file = input.files[0];
        // alert("File " + file.name + " is " + file.size + " bytes in size");

        // TODO: Fix append
        // var newElem = document.createElement('p');
        // newElem.innerHTML = "File " + file.name + " is " + file.size + " bytes in size";
        // var newAside = document.getElementByTag('aside');
        // item.appendChild(newElem)
        // document.bodyAppend("p", "File " + file.name + " is " + file.size + " bytes in size");
        return 1;
    }
}

