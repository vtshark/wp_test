jQuery(document).ready(function($) {

    function showLoginForm(m) {
        $("#ds-error").html("");
        $("#ds-form-reg").fadeOut();
        if (m) {
            $("#ds-form-login").fadeIn(100);
        } else {
            $("#ds-form-login").fadeOut(100);
        }
    }

    function showRegForm(m) {
        //$("#ds-error").html("");
        $("#ds-form-login").fadeOut();
        if (m) {
            $("#ds-form-reg").fadeIn(100);
        } else {
            $("#ds-form-reg").fadeOut(100);
        }
    }
    function showErrorLogin(str) {
        $("#ds-error").html(str);
    }
    function loginFun() {
        $.ajax({
           type: 'POST',
            url:ds_obj.url_ajax,
            data: {
                login: $("#ds-login").val(),
                pass: $("#ds-password").val(),
                action: 'ds_login'
            },
            success: function(res) {
                //console.log(res);
                if (res!="0") {
                    showErrorLogin(res);
                } else {
                    location = ds_obj.url_root;
                }
            },
            error: function() {
                alert('ошибка');
            }
        });
    }

    $(".ds-button").click(function(e){
        //console.log(e.target.id);
        switch (e.target.id) {
            //  показать / закрыть форму авторизации
            case "ds-signIn":
                showLoginForm(1);
                break;
            case "ds-close-form-login":
                showLoginForm(0);
                break;
            //  авторизировать
            case "ds-form-login-signin":
                loginFun();
                break;

            //  показать / закрыть форму регистрации
            case "ds-reg":
                showRegForm(1);
                break;
            case "ds-close-form-reg":
                showRegForm(0);
                break;

            case "ds-signOut":
                break;

        }
    });
});