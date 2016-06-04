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

    wp_localize_script("ds_scripts","ds_obj",['url_ajax' => admin_url('admin-ajax.php'),
                                            'url_root' => site_url(),
                                            'url_plugins' => plugins_url(),
                                            'key' => wp_create_nonce('ds123')
                                            ]);
}

function ds_secure() {
    if ( !wp_verify_nonce($_POST['key'],'ds123') ) {
            wp_die('Ошибка безопасности');
    }
}

function ds_login() {

    ds_secure();

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

function ds_logout() {
    wp_logout();
    wp_die();
}

function ds_reg() {
    ds_secure();
    $error = 0;
    $str = "<strong>Ошибка:</strong>";
        if (!$_POST['login']) {
            $error = "$str Введите логин.";
            wp_die($error);
        }
        if ( !is_email($_POST['email']) ) {
            $error = "$str Некорректный e-mail.";
            wp_die($error);
        }

        if ( !$_POST['pass'] ) {
            $error = "$str Введите пароль.";
            wp_die($error);
        }

        if ( $_POST['pass'] != $_POST['pass1'] ) {
            $error = "$str Пароли не совпадают.";
            wp_die($error);
        }

        if (!$error) {
            $user = wp_create_user($_POST['login'], $_POST['pass'], $_POST['email']);
            if ( is_wp_error($user) ) {
                $error = is_wp_error($user) ? $user->get_error_message() : 0;
                wp_die($error);
            }
        }
}