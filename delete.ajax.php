<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'back/DAOContact.php';
require_once 'back/Contact.php';

$ids = explode(',', $_GET['_id']);

if (gettype($ids) == 'array') {
    for ($ii = 0; $ii < sizeof($ids); $ii++) {
        $node = Contact::select($ids[$ii]);
        Contact::delete($node);
    }
} else {
    $node = Contact::select($ids);
    Contact::delete($node);
}

echo 1;
