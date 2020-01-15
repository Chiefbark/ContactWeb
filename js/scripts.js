function itemClick() {
    if (!event.target.classList.contains('btn-floating')) {
        this.parentNode.classList.toggle('selected');
        var selected = document.getElementsByClassName('selected').length;
        if (!selected)
            document.querySelector('.btn-floating.custom[title="delete"]').classList.add('hidden');
        else
            document.querySelector('.btn-floating.custom[title="delete"]').classList.remove('hidden');
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
    var items = document.querySelectorAll('#search-content .search-item');
    for (var item of items)
        item.classList.remove('hidden');

    var items = document.querySelectorAll('#search-content .search-item:not([aria-label*="' + elem.value + '"])');
    if (elem.value && items)
        for (var item of items)
            item.classList.add('hidden');
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
    var items = document.querySelectorAll('#search-content .search-item.selected');
    for (var ii = 0; ii < items.length; ii++)
        items[ii].classList.add('remove');

    setTimeout(function () {
        for (var ii = 0; ii < items.length; ii++)
            document.getElementById('search-content').removeChild(items[ii]);
    }, 500);

    var ids = [];
    for (var item of items)
        ids.push(item.id);

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