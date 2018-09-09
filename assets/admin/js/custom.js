/*--------------------------------------
 * Author:       Luiz Fernando Venturelli
 * Created:      28/01/2016
 * Last change:
 -----------------------------------------*/

BASEURL = 'https://www.sigalerta.com/';
//BASEURL = 'http://localhost:8080/SigaAlerta/';
//BASEURL = 'https://simonsautobody.com/homologation/sigalerta/';

/**
 * GENERAL
 */

$(document).ready(function() {
    $(".input-focus").focus();
    $("#btn-submit-login").html('Entrar');
    $("#inputPass").attr('disabled', true);

    //habilita o input senha se o botão for checkado
    $("#cbkUpdatePass").on("click", function() {
        if ($(this).prop("checked")) {
            $("#inputPass").attr('disabled', false);
            $("#inputPass").focus();
        } else {
            $("#inputPass").attr('disabled', true);
        }
    });
});


/***********************************
 MODULOS
 **********************************/

/**
 * LOGIN
 */
$('#frm-login').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'admin/login/check_login',
            data: dados,
            beforeSend: function() {
                $("#btn-submit-login").html('Carregando...' + ' <img src="assets/admin/img/gif/ajax-loader.gif">');
            },
            success: function(data) {
                // console.log(data);
                if (data === 'TRUE') {
                    $(location).attr('href', 'admin/dashboard');
                } else if (data === 'FALSE') {
                    msg('Login ou Senha inválidos!', 'erro');
                    $("#btn-submit-login").html('Entrar');
                }
            },
            error: function() {
                msg("Erro ao logar, consulte o administrador do sistema!", "error");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * FORM INSERIR USUARIO
 */
$("#frm-user-insert").validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        //
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/user/setInsert',
            data: dados,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registros cadastrados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/user');
                    }, 3000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                console.error(data);
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * FORM EDITAR USUARIO
 */
$('#frm-user-edit').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        //console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        console.log(dados);
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/user/setUpdate',
            data: dados,
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                console.log(data);
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registros cadastrados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/user');
                    }, 3000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                //console.log(data);
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * DELETE USUARIO
 */
$(".btn-delete-user").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    $(".msg").html('Deseja realmente excluir este registro?');
    $("#myModal").modal();
    $("#btn-delete-ok").on('click', function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'admin/usuario/setDelete',
            data: dados,
            beforeSend: function() {
                msg('Aguarde...', 'info');
            },
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    msg('Registro excluido com sucesso!', 'sucesso');
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/usuario');
                    }, 1000);
                } else if (data === 'FALSE') {
                    msg('Não foi possível excluir este registro!', 'erro');
                }
            },
            error: function() {
                msg("Erro! Por favor, consulte o administrador do sistema.", "erro");
            }
        });
    });
});


/**
 * FORM NEWS - INSERT
 */
$("#frm-news-insert").validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-news-insert")[0]);
        //console.log(form.get('edtTitle'));
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/news/setInsert',
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registros cadastrados com sucesso!", "success");
                    //$("#frm-imo")[0].reset();
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/news');
                    }, 3000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                //console.log(data);
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * FORM NEWS - UPDATE
 */
$('#frm-news-update').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-news-update")[0]);
        console.log(form);
        $.ajax({
            url: BASEURL + 'admin/news/setUpdate',
            type: "POST",
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registro atualizado com sucesso!", "success");
                    //$("#frm-imo")[0].reset();
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/news');
                    }, 3000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                console.log(data);
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * FORM NEWS - DELETE
 */
$(".btn-delete-news").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'admin/news/setDelete',
            data: dados,
            beforeSend: function(data) {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                //console.log(data);                
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/news');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                $.unblockUI();
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});


/**
 * FORM COLUMNISTS - INSERT
 */
$("#frm-columnists-insert").validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-columnists-insert")[0]);
        //console.log(form.get('edtTitle'));
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/columnists/setInsert',
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registros cadastrados com sucesso!", "success");
                    //$("#frm-imo")[0].reset();
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/columnists');
                    }, 3000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                //console.log(data);
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * FORM NEWS - UPDATE
 */
$('#frm-columnists-update').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-columnists-update")[0]);
        console.log(form);
        $.ajax({
            url: BASEURL + 'admin/columnists/setUpdate',
            type: "POST",
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registro atualizado com sucesso!", "success");
                    //$("#frm-imo")[0].reset();
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/columnists');
                    }, 3000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                console.log(data);
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * FORM NEWS - DELETE
 */
$(".btn-delete-columnists").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'admin/columnists/setDelete',
            data: dados,
            beforeSend: function(data) {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                //console.log(data);                
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/columnists');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                $.unblockUI();
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});



/**
 * FORM SERVICE - INSERT
 */
$("#frm-service-insert").validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-service-insert")[0]);
        //console.log(form.get('edtTitle'));
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/service/setInsert',
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registros cadastrados com sucesso!", "success");
                    //$("#frm-imo")[0].reset();
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/service');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                //console.log(data);
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * FORM SERVICE - UPDATE
 */
$('#frm-service-update').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-service-update")[0]);
        //console.log(form);
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/service/setUpdate',
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registro atualizado com sucesso!", "success");
                    //$("#frm-imo")[0].reset();
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/service');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * FORM SERVICE - DELETE
 */
$(".btn-delete-service").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'admin/service/setDelete',
            data: dados,
            beforeSend: function(data) {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                //console.log(data);                
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', '');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                $.unblockUI();
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});


/**
 * FORM FOR HOME - INSERT
 */
$("#frm-forhome-insert").validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-forhome-insert")[0]);
        //console.log(form.get('edtTitle'));
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/forhome/setInsert',
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registros cadastrados com sucesso!", "success");
                    //$("#frm-imo")[0].reset();
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/forhome');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                //console.log(data);
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * FORM FOR HOME - UPDATE
 */
$('#frm-forhome-update').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-forhome-update")[0]);
        //console.log(form);
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/forhome/setUpdate',
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registro atualizado com sucesso!", "success");
                    //$("#frm-imo")[0].reset();
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/forhome');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * FORM FOR HOME - DELETE
 */
$(".btn-delete-forhome").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'admin/forhome/setDelete',
            data: dados,
            beforeSend: function(data) {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                //console.log(data);                
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', '');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                $.unblockUI();
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});


/**
 * FORM CLASSIFIED - INSERT
 */
$("#frm-classified-insert").validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-classified-insert")[0]);
        //console.log(form.get('edtTitle'));
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/classified/setInsert',
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registros cadastrados com sucesso!", "success");
                    //$("#frm-imo")[0].reset();                    
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/classified');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                //console.log(data);
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});



/**
 * FORM CLASSIFIED - UPDATE
 */
$('#frm-classified-update').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-classified-update")[0]);
        //console.log(form);
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/classified/setUpdate',
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registro atualizado com sucesso!", "success");
                    //$("#frm-imo")[0].reset();
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/classified');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * FORM CLASSIFIED - DELETE
 */
$(".btn-delete-classified").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'admin/classified/setDelete',
            data: dados,
            beforeSend: function(data) {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                //console.log(data);                
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', '');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                $.unblockUI();
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});


/**
 * FORM ADVERTISING - INSERT
 */
$("#frm-advertising-insert").validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-advertising-insert")[0]);
        //console.log(form.get('edtTitle'));
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/advertising/setInsert',
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registros cadastrados com sucesso!", "success");
                    //$("#frm-imo")[0].reset();
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/advertising');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                //console.log(data);
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * FORM ADVERTISING - UPDATE
 */
$('#frm-advertising-update').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        tinyMCE.triggerSave();
        var form = new FormData($("#frm-advertising-update")[0]);
        //console.log(form);
        $.ajax({
            type: "POST",
            url: BASEURL + 'admin/advertising/setUpdate',
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //async: false, //blocks window close
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal("", "Registro atualizado com sucesso!", "success");
                    //$("#frm-imo")[0].reset();
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'admin/advertising');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function(data) {
                $.unblockUI();
                swal("Atenção", "Erro ao atualizar, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * FORM ADVERTISING - DELETE
 */
$(".btn-delete-advertising").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'admin/advertising/setDelete',
            data: dados,
            beforeSend: function(data) {
                $.blockUI({
                    message: '<h3>processando...</h3>',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }
                });
            },
            success: function(data) {
                //console.log(data);                
                if (data === 'TRUE') {
                    $.unblockUI();
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', '');
                    }, 2000);
                } else if (data === 'FALSE') {
                    $.unblockUI();
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                $.unblockUI();
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});












/**
 * FUNCAO DE VALIDACAO
 */
function msg(msg, tipo) {
    var retorno = $(".msg");
    var tipo = (tipo === 'sucesso') ? 'success' : (tipo === 'alerta') ? 'warning' : (tipo === 'erro') ? 'danger' : (tipo === 'info') ? 'info' : alert('INFORME MENSAGENS DE SUCESSO, ALERTA, ERRO E INFO');
    retorno.empty().fadeOut('fast', function() {
        return $(this).html('<div class="alert alert-' + tipo + '">' + msg + '</div>').fadeIn('slow');
    });
    //esconde a div depois de 5 segundos
    setTimeout(function() {
        retorno.fadeOut('slow');
    }, 3000);
}


$(".col-category").hide();
$("#cmd-category").on('change', function() {
    var category = $(this).val();
    if (category === 'Advogado') {
        $(".col-category").show();
    } else {
        $(".col-category").hide();
    }
});

$(".col-type-category").hide();
$("#cmd-category-classified").on('change', function() {
    var category = $(this).val();
    if (category === 'Automóveis') {
        $(".col-type-category").show();
    } else {
        $(".col-type-category").hide();
    }
});