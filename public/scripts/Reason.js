
//used in admin and user resservation to disable and enable the other input text

lucide.createIcons();

//to enable the input text
function showinput(id) {
    var text = document.getElementById('otherinput');
    text.required = true;
    text.disabled = false;
}

//to disable the input text
function hideinput(id) {
    var text = document.getElementById('otherinput');
    text.required = false;
    text.disabled = true;
    text.value = " ";
}