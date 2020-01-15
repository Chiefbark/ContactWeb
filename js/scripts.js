function showForm() {
    document.getElementById('form').classList.remove('hidden');
}

function hideForm() {
    if (event.target === document.getElementById('form'))
        document.getElementById('form').classList.add('hidden');
}

function remove() {
    var rows = document.getElementsByClassName('tr-selected');
    for (var ii = 0; ii < rows.length; ii++) {
        rows[ii].classList.add('remove');
        (function (index) {
            setTimeout(function () {
                rows[index].style.display = 'none';
            }, 500)
        })(ii);
    }

    // api?reload?
}

function filter(elem) {
    var rows = document.querySelectorAll('tr.custom');
    for (var tr of rows)
        tr.classList.remove('hidden');

    var rows = document.querySelectorAll('tr.custom:not([aria-label*="' + elem.value + '"])');
    if (elem.value && rows)
        for (var tr of rows)
            tr.classList.add('hidden');
}