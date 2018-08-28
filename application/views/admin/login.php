<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Painel Administrativo .: Sigalerta :.</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/AdminLTE.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/iCheck/square/blue.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/custom.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="<?php echo base_url(); ?>assets/admin/img/logo.png" />
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Informe seu usuário e senha <br> para entrar no sistema</p>
                <div class="msg"></div>
                <form id="frm-login">
                    <div class="form-group has-feedback">
                        <input type="text" name="edtLogin" class="form-control input-focus"  data-error="Preencha este campo." id="input-login" placeholder="Login" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="edtPass" class="form-control" id="input-senha"  data-error="Preencha este campo." placeholder="Senha" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-red btn-flat" id="btn-submit-login"></button>
                        </div>
<!--                        <div class="col-xs-8">
                            <a href="<?php echo base_url(); ?>" class="pull-right">Esqueci a senha</a>
                        </div>-->
                    </div>
                </form>
            </div>
            <p class="f-text"><a href="<?php echo base_url(); ?>">Ir para o site</a></p>
        </div>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jquery-1.12.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-validator/validator.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>