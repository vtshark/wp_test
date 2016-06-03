jQuery(document).ready(function($) {

    function showLoginForm(m) {
        $("#ds-form-reg").fadeOut();
        if (m) {
            $("#ds-form-login").fadeIn("slow");
        } else {
            $("#ds-form-login").fadeOut("slow");
        }
    }

    function showRegForm(m) {
        $("#ds-form-login").fadeOut();
        if (m) {
            $("#ds-form-reg").fadeIn("slow");
        } else {
            $("#ds-form-reg").fadeOut("slow");
        }
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