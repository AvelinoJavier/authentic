function toUppercase(e) {
    var start = e.selectionStart;
    var end = e.selectionEnd;
    e.value = e.value.toUpperCase();
    e.setSelectionRange(start, end);
}