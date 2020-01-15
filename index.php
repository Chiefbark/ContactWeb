<?php
require_once 'back/DAOContact.php';
require_once 'back/Contact.php';
?>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/styles.css" />

    <script src="js/scripts.js"></script>
    <script>
        window.addEventListener('load', function() {
            var floating = document.getElementsByClassName('btn-floating');
            for (var btn of floating) {
                btn.addEventListener('click', function() {
                    var temp = this;
                    temp.classList.add('pulse');
                    setTimeout(function() {
                        temp.classList.remove('pulse');
                    }, 1000);
                });
            }
            var rows = document.getElementsByTagName('tr');
            for (var tr of rows)
                tr.addEventListener('click', function() {
                    this.classList.toggle('tr-selected');
                    var selected = document.getElementsByClassName('tr-selected').length;
                    if (!selected) {
                        document.querySelector('.btn-floating.custom[title="delete"]').classList.add('hidden');
                        document.querySelector('.btn-floating.custom[title="edit"]').classList.add('hidden');
                    } else if (selected > 1)
                        document.querySelector('.btn-floating.custom[title="edit"]').classList.add('hidden');
                    else {
                        document.querySelector('.btn-floating.custom[title="delete"]').classList.remove('hidden');
                        document.querySelector('.btn-floating.custom[title="edit"]').classList.remove('hidden');
                    }
                });
        })
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo left"><i class="material-icons right" style="font-size: 30pt;">book</i></a>
                <div class="input-field custom right">
                    <input id="search" type="search" placehoder="nombre..." required onkeyup="filter(this);">
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </div>
        </nav>
    </div>
    <table class="highlight centered responsive-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Comentario</th>
            </tr>
        </thead>

        <tbody>
            <tr class="custom" aria-label="jorge" id="1">
                <td>Jorge</td>
                <td>678164830</td>
                <td>jchercoles@gmail.com</td>
                <td class="" style="max-width: 200px;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae aliquid accusantium debitis perferendis sed voluptatibus, officia alias doloremque, quis ab cum ad facere quia. Repellendus in vel modi harum consectetur!</td>
            </tr>
            <tr class="custom" aria-label="javier" id="2">
                <td>Javier</td>
                <td>647291019</td>
                <td>jaguilar@gmail.com</td>
                <td class="" style="max-width: 200px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem amet reiciendis officiis, nisi a excepturi mollitia fuga earum rerum natus tenetur possimus repudiandae, et quae? Ipsum eaque tenetur pariatur doloremque!</td>
            </tr>
            <tr class="custom" aria-label="alberto" id="3">
                <td>Alberto</td>
                <td>123674892</td>
                <td>acocido@gmail.com</td>
                <td class="" style="max-width: 200px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea natus esse perspiciatis, error illum id facere doloribus aliquid, cupiditate et eum repellat eligendi voluptate odit culpa eaque fugiat vel sunt?</td>
            </tr>
        </tbody>
    </table>

    <div id="form" class="custom form row center-align hidden" onclick="hideForm(this);">
        <form action="index.php" method="post" class="col s6 scale-transition">
            <h2>Añade un nuevo contacto</h2>
            <div class="input-field row">
                <input id="name" type="text" class="validate">
                <label for="name">Nombre*</label>
            </div>
            <div class="input-field row">
                <input id="phone" type="text" class="validate">
                <label for="phone">Teléfono*</label>
            </div>
            <div class="input-field row">
                <input id="mail" type="text" class="validate">
                <label for="mail">Email*</label>
            </div>
            <div class="input-field row">
                <textarea id="comment" class="materialize-textarea"></textarea>
                <label for="comment">Textarea</label>
            </div>
            <button class="btn waves-effect waves-light materialize-red lighten-2" type="submit" name="action">Añadir
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>

    <a href="javascript:edit();" class="btn-floating custom materialize-red lighten-2 hidden" title="edit"><i class="material-icons">edit</i></a>
    <a href="javascript:remove();" class="btn-floating custom materialize-red lighten-2 hidden" title="delete"><i class="material-icons">delete</i></a>
    <a href="javascript:showForm();" class="btn-floating custom materialize-red lighten-2" title="create"><i class="material-icons">add</i></a>

    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>