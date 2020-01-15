<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'back/DAOContact.php';
require_once 'back/Contact.php';

$node = new Contact();
if (isset($_POST) && !empty($_POST)) {
    if (!empty($_POST['_id'])) {
        $node = new Contact($_POST['_id'], $_POST['name'], $_POST['phone'], $_POST['mail'], $_POST['comment']);
        Contact::update($node);
    } else {
        $node = new Contact();
        $node->fill($_POST['name'], $_POST['phone'], $_POST['mail'], $_POST['comment']);
        Contact::insert($node);
    }
}
if (isset($_GET['_id']) && !empty($_GET['_id'])) {
    $node = Contact::select($_GET['_id']);
} else
    $node = new Contact();

$list = ContactList::selectAll();
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
            var items = document.querySelectorAll('#search-content .search-item>div');
            for (var item of items)
                item.addEventListener('click', itemClick);
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

    <div class="row" id="search-content">
        <?php
        echo $list->getHTML();
        ?>
    </div>

    <div id="form" class="custom form row center-align <?php echo $node->getId() ? '' : 'hidden'; ?>" onclick="hideForm(this);">
        <form action="index.php" method="post" class="col s10 m6 scale-transition">
            <h2>Añade un nuevo contacto</h2>
            <input type="hidden" name="_id" value="<?php echo $node->getId(); ?>">
            <div class="input-field row">
                <input id="name" name="name" type="text" class="validate" value="<?php echo $node->getName(); ?>" required>
                <label for="name">Nombre*</label>
            </div>
            <div class="input-field row">
                <input id="phone" name="phone" type="tel" class="validate" value="<?php echo $node->getPhone(); ?>" required>
                <label for="phone">Teléfono*</label>
            </div>
            <div class="input-field row">
                <input id="mail" name="mail" type="email" class="validate" value="<?php echo $node->getMail(); ?>" required>
                <label for="mail">Email*</label>
            </div>
            <div class="input-field row">
                <textarea id="comment" name="comment" class="materialize-textarea" required><?php echo $node->getComment(); ?></textarea>
                <label for="comment">Comentario*</label>
            </div>
            <button class="btn waves-effect waves-light materialize-red lighten-2" type="submit" name="action">Añadir <i class="material-icons right">send</i>
            </button>
        </form>
    </div>

    <a href="javascript:remove();" class="btn-floating btn-large custom materialize-red lighten-2 hidden" title="delete"><i class="material-icons">delete</i></a>
    <a href="javascript:showForm();" class="btn-floating btn-large custom materialize-red lighten-2" title="create"><i class="material-icons">add</i></a>

    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>