$(document).ready(function() {
    var searchElement = document.getElementById("search");
    if (searchElement)
        searchElement.addEventListener("search", function(event) {
            if (!event.target.value)
                window.location.replace(location.protocol + '//' + location.host + location.pathname);
        });
});

function toUppercase(e) {
    var start = e.selectionStart;
    var end = e.selectionEnd;
    e.value = e.value.toUpperCase();
    e.setSelectionRange(start, end);
}