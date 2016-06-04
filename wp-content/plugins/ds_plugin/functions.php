<?php
function ds_content($cont) {
    if (!is_user_logged_in()) {
        include "templates/panelSignIn.php";
        include "templates/loginForm.php";
        include "templates/regForm.php";

    } else {
        include "templates/panelSignOut.php";
    }
    return $cont;
}

function ds_scripts() {

    wp_enqueue_script("ds_scripts",plugins_url("/js/script.js",__FILE__),
        array("jquery"),null,true);

    wp_enqueue_style("ds_style",plugins_url("/css/style.css",__FILE__),null,null);

    wp_localize_script("ds_scripts","ds_obj",['url_ajax'=> admin_url('admin-ajax.php'),
                                            'url_root'=> site_url()]);
}

function ds_login() {
    if (isset($_POST['login'])) {

        $arr = [];
        $arr['user_login'] = $_POST['login'];
        $arr['user_password'] = $_POST['pass'];
        $arr['remember'] = false;

        $user = wp_signon( $arr, false );

        echo is_wp_error($user) ? $user->get_error_message() : 0;
    }

    wp_die();
}