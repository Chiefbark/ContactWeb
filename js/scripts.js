function trClick() {
    this.classList.toggle('tr-selected');
    var selected = document.getElementsByClassName('tr-selected').length;
    if (!selected) {
        document.querySelector('.btn-floating.custom[title="delete"]').classList.add('hidden');
        document.querySelector('.btn-floating.custom[title="edit"]').classList.add('hidden');
        document.querySelector('.btn-floating.custom[title="edit"]').href = '#';
    } else if (selected > 1) {
        document.querySelector('.btn-floating.custom[title="edit"]').classList.add('hidden');
        document.querySelector('.btn-floating.custom[title="edit"]').href = '#';
    } else {
        document.querySelector('.btn-floating.custom[title="delete"]').classList.remove('hidden');
        document.querySelector('.btn-floating.custom[title="edit"]').classList.remove('hidden');
        document.querySelector('.btn-floating.custom[title="edit"]').href = "index.php?_id=" + document.querySelector('tr.custom.tr-selected').id;
    }
}

function showForm() {
    document.getElementById('form').classList.remove('hidden');
}

function hideForm() {
    if (event.target === document.getElementById('form')) {
        document.getElementById('form').classList.add('hidden');
        document.getElementById('name').value = '';
        document.getElementById('phone').value = '';
        document.getElementById('mail').value = '';
        document.getElementById('comment').innerHTML = '';
    }
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

function getAjaxRequest() {
    try {
        var req = new XMLHttpRequest();
    } catch (err1) {
        try {
            req = new ActiveXObject('Msxml2.XMLHTTP');
        } catch (err2) {
            try {
                req = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (err3) {
                req = false;
            }
        }
    }
    return req;
}

var connection = getAjaxRequest();

function remove() {
    var rows = document.getElementsByClassName('tr-selected');
    for (var ii = 0; ii < rows.length; ii++) {
        rows[ii].classList.add('remove');
    }

    setTimeout(function () {
        for (var ii = 0; ii < rows.length; ii++) {
            if (rows[ii].classList.contains('remove'))
                document.getElementById('records').removeChild(rows[ii--]);
        }
    }, 500);

    var ids = [];
    for (var tr of rows)
        ids.push(tr.id);

    setTimeout(function () {
        delete_ajax(ids);
    }, 500);

    document.querySelector('.btn-floating.custom[title="delete"]').classList.add('hidden');
}

function delete_ajax(ids) {
    var destination = 'delete.ajax.php';
    var rnd = parseInt(Math.random() * 999999999999999);
    var url = destination + '?rand=' + rnd + '&_id=' + ids;

    connection.open('GET', url, true);
    connection.send(null);
}