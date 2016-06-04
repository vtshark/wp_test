jQuery(document).ready(function($) {

    function showLoginForm(m) {
        $("#ds-form-reg").fadeOut();
        if (m) {
            $("#ds-form-login").fadeIn(200);
        } else {
            $("#ds-form-login").fadeOut(200);
        }
    }

    function showRegForm(m) {
        $("#ds-form-login").fadeOut();
        if (m) {
            $("#ds-form-reg").fadeIn(200);
        } else {
            $("#ds-form-reg").fadeOut(200);
        }
    }
    function showError(idForm,str) {
        //console.log(str);
        $("#"+idForm).html(str);
    }
    function showBarProcess(idForm) {
        $("#"+idForm).html("<img src='"+ ds_obj.url_plugins +"/ds_plugin/img/720.gif'>");
    }
    function loginFun() {
        showBarProcess("ds-login-error");
        $.ajax({
           type: 'POST',
            url:ds_obj.url_ajax,
            data: {
                key : ds_obj.key,
                login : $("#ds-login").val(),
                pass : $("#ds-password").val(),
                action : 'ds_login'
            },
            success: function(res) {
                //console.log(res);
                if (res!="0") {
                    showError("ds-login-error",res);
                } else {
                    location = ds_obj.url_root;
                }
            },
            error: function() {
                alert('ошибка');
            }
        });
    }

    function logoutFun() {
        $.ajax({
            type: 'POST',
            url:ds_obj.url_ajax,
            data: {
                action: 'ds_logout'
            },
            success: function(res) {
                //console.log(res);
                location = ds_obj.url_root;
            },
            error: function() {
                alert('ошибка');
            }
        });
    }

    function regFun() {
        showBarProcess("ds-reg-error");
        $.ajax({
            type: 'POST',
            url:ds_obj.url_ajax,
            data: {
                key : ds_obj.key,
                login: $("#ds-reg-login").val(),
                pass: $("#ds-reg-password").val(),
                pass1: $("#ds-reg-password1").val(),
                email: $("#ds-reg-email").val(),
                action: 'ds_reg'
            },
            success: function(res) {
                if (res!="0") {

                    showError("ds-reg-error",res);
                } else {
                    //если регистрация успешна - авторизируем
                    $("#ds-login").val( $("#ds-reg-login").val() );
                    $("#ds-password").val( $("#ds-reg-password").val() );
                    loginFun();
                }
            },
            error: function() {
                alert('ошибка');
            }
        });
    }
    //////////////////////////////////////

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

            case "ds-reg-user":
                regFun();
                break;


            case "ds-signOut":
                logoutFun();
                break;

        }
    });

    $("#ds-password").keypress(function(e){
        if(e.keyCode==13){
            loginFun();
        }
    });

});