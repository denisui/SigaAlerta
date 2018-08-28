
/********************************************************
 * Description:  VALIDACOES DOS STEPS DO SISTEMA
 * Project:      SYSIMOVI
 * Author:       AGÊNCIA LOGGE - Luiz Fernando Venturelli
 * Created:      20/07/2015
 * Last change:  
 ********************************************************/


/*****************************************
 step Cad Visit
 *****************************************/

$("#frm-cad-visit").validate({
    rules: {
        firstname: {
            minlength: 3,
            maxlength: 15,
            required: true
        },
        lastname: {
            minlength: 3,
            maxlength: 15,
            required: true
        }
    },
    highlight: function (element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function (element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

$("#frm-cad-visit").children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex) {
        $("#frm-cad-visit").validate().settings.ignore = ":disabled,:hidden";
        return $("#frm-cad-visit").valid();
    },
    onFinishing: function (event, currentIndex) {
        $("#frm-cad-visit").validate().settings.ignore = ":disabled";
        return $("#frm-cad-visit").valid();
    },
    onFinished: function (event, currentIndex) {
        var dados = 'action=insertCadVisit&' + $("#frm-cad-visit").serialize();

        $.ajax({
            type: 'POST',
            url: "http://127.0.0.1:8080/sysImovi/app/controller/controller.php",
            data: dados,
            beforeSend: function () {
                $(".retorno").fadeIn('slow', function () {
                    $(this).html("<img src='http://127.0.0.1:8080/sysImovi/images/ajax-loader.gif' alt='carregando...' class='text-center'>");
                });
            },
            success: function (retorno) {
                $(".retorno").fadeOut('slow', function () {
                    $(this).html("<img src='http://127.0.0.1:8080/sysImovi/images/ajax-loader.gif' alt='carregando...' class='text-center'>");
                    if (retorno === 'TRUE') {
                        msg("Dados cadastrados com sucesso!", "sucesso");
                    } else {
                        msg("Falha ao cadastrar visitas. Por favor, consulte o administrador do sistema!", "erro");
                    }
                });
            },
            error: function (retorno) {
                if (retorno === 'FALSE') {
                    msg("Erro, consulte o administrador do sistema!", "erro");
                }
            },
            complete: function () {
                setTimeout(function () {
                    $(location).attr('href', '');
                }, 5000);
            }
        });
    }
});


/*****************************************
 STEP IMMOBLE
 *****************************************/

$("#frm-immoble").validate({
    rules: {
        firstname: {
            minlength: 3,
            maxlength: 15,
            required: true
        },
        lastname: {
            minlength: 3,
            maxlength: 15,
            required: true
        }
    },
    highlight: function (element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function (element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

$("#frm-immoble").children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex) {
        $("#frm-immoble").validate().settings.ignore = ":disabled,:hidden";
        return $("#frm-immoble").valid();
    },
    onFinishing: function (event, currentIndex) {
        $("#frm-immoble").validate().settings.ignore = ":disabled";
        return $("#frm-immoble").valid();
    },
    onFinished: function (event, currentIndex) {
        var dados = 'action=CadImmbole&' + $("#frm-immoble").serialize();
        $.ajax({
            type: 'POST',
            url: "http://127.0.0.1:8080/sysImovi/app/controller/controller.php",
            data: dados,
            beforeSend: function () {
                $("#frm-cad-visit").fadeOut('slow', function () {
                    $(".retorno").fadeIn('slow', function () {
                        $(this).html("<img src='http://127.0.0.1:8080/sysImovi/images/ajax-loader.gif' alt='carregando...' class='text-center'>");
                    });
                });
            },
            success: function (retorno) {
                if (retorno === 'cadastrou') {
                    msg("Dados cadastrados com sucesso!", "sucesso");
                }
            },
            error: function (retorno) {
                if (retorno === 'nocadastro') {
                    msg("Erro ao cadastrar visita!", "error");
                }
            },
            complete: function () {
                setTimeout(function () {
                    $(location).attr('href', 'visitas');
                }, 3000);
            }
        });
    }
});



/*****************************************
 step ENTER FINANCES
 *****************************************/

$("#frm-enter-finances").validate({
    rules: {
        firstname: {
            minlength: 3,
            maxlength: 15,
            required: true
        },
        lastname: {
            minlength: 3,
            maxlength: 15,
            required: true
        }
    },
    highlight: function (element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function (element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

$("#frm-enter-finances").children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex) {
        $("#frm-enter-finances").validate().settings.ignore = ":disabled,:hidden";
        return $("#frm-enter-finances").valid();
    },
    onFinishing: function (event, currentIndex) {
        $("#frm-enter-finances").validate().settings.ignore = ":disabled";
        return $("#frm-enter-finances").valid();
    },
    onFinished: function (event, currentIndex) {
        var dados = 'action=insertCadEnterFinance&' + $("#frm-enter-finances").serialize();
        $.ajax({
            type: 'POST',
            url: "http://127.0.0.1:8080/sysImovi/app/controller/controller.php",
            data: dados,
            beforeSend: function () {
                $(".retorno").fadeIn('slow', function () {
                    $(this).html("<img src='http://127.0.0.1:8080/sysImovi/images/ajax-loader.gif' alt='carregando...' class='text-center'>");
                });
            },
            success: function (retorno) {
                $(".retorno").fadeOut('slow', function () {
                    $(this).html("<img src='http://127.0.0.1:8080/sysImovi/images/ajax-loader.gif' alt='carregando...' class='text-center'>");
                    if (retorno === 'TRUE') {
                        msg("Dados cadastrados com sucesso!", "sucesso");
                    } else {
                        msg("Falha ao cadastrar entrada financeira. Por favor, consulte o administrador do sistema!", "erro");
                    }
                });
            },
            error: function (retorno) {
                if (retorno === 'FALSE') {
                    msg("Erro, consulte o administrador do sistema!", "erro");
                }
            },
            complete: function () {
                setTimeout(function () {
                    $(location).attr('href', '');
                }, 5000);
            }
        });
    }
});

/*****************************************
 step EXIT FINANCES
 *****************************************/

$("#frm-exit-finances").validate({
    rules: {
        firstname: {
            minlength: 3,
            maxlength: 15,
            required: true
        },
        lastname: {
            minlength: 3,
            maxlength: 15,
            required: true
        }
    },
    highlight: function (element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function (element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

$("#frm-exit-finances").children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex) {
        $("#frm-exit-finances").validate().settings.ignore = ":disabled,:hidden";
        return $("#frm-exit-finances").valid();
    },
    onFinishing: function (event, currentIndex) {
        $("#frm-exit-finances").validate().settings.ignore = ":disabled";
        return $("#frm-exit-finances").valid();
    },
    onFinished: function (event, currentIndex) {
        var dados = 'action=insertCadExitFinance&' + $("#frm-exit-finances").serialize();
        $.ajax({
            type: 'POST',
            url: "http://127.0.0.1:8080/sysImovi/app/controller/controller.php",
            data: dados,
            beforeSend: function () {
                $(".retorno").fadeIn('slow', function () {
                    $(this).html("<img src='http://127.0.0.1:8080/sysImovi/images/ajax-loader.gif' alt='carregando...' class='text-center'>");
                });
            },
            success: function (retorno) {
                $(".retorno").fadeOut('slow', function () {
                    $(this).html("<img src='http://127.0.0.1:8080/sysImovi/images/ajax-loader.gif' alt='carregando...' class='text-center'>");
                    if (retorno === 'TRUE') {
                        msg("Dados cadastrados com sucesso!", "sucesso");
                    } else {
                        msg("Falha ao cadastrar Saida Financeira. Por favor, consulte o administrador do sistema!", "erro");
                    }
                });
            },
            error: function (retorno) {
                if (retorno === 'FALSE') {
                    msg("Erro, consulte o administrador do sistema!", "erro");
                }
            },
            complete: function () {
                setTimeout(function () {
                    $(location).attr('href', '');
                }, 5000);
            }
        });
    }
});