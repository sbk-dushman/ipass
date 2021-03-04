<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search_REQ = $_POST['serch-req'];
    return $search_REQ;
}
