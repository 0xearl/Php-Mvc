<?php 

/**
 * This file is just a compilation of functions that helps everyone :).
 */

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function response($status = 200, $data = null) {
    
    if ($status === 404) {
        http_response_code($status);
        return include_once('./404.html');
    }

    http_response_code($status);
    echo json_encode($data);
}


function view($view, $data = []) {
    extract($data);
    include_once('./views/' . $view . '.temp.php');
}

function redirect($url) {
    http_response_code(301);
    header('Location: ' . $url);
}

function session() {
    return new App\Session();
}