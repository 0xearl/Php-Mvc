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

function response($data = null, $status = 200) {
    
    if ($status === 404) {
        http_response_code($status);
        return include_once('./404.html');
    }

    http_response_code($status);
    echo json_encode($data);
}


function view($view, $data = []) {
    extract($data);
    include_once('./App/Views/' . $view . '.temp.php');
}
