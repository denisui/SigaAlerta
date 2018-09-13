<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Painel Administrativo - Sigalerta .: Usuário :.</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->load->view('admin/include/styles/style.php'); ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini fixed">
        <?php
        $u = new ArrayIterator($user);
        while ($u->valid()) :
            ?>
            <div class="wrapper">
                <?php $this->load->view('admin/include/header/header'); ?>
                <?php $this->load->view('admin/include/main-menu/main-menu'); ?>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/user">Usuário</a></li>
                            <li class="active">Editar</li>
                        </ol>
                    </section>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="gap-50"></div>
                                <div class="box">                                
                                    <div class="box-header">
                                        <h3 class="box-title">Editanto Usuário</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="msg"></div>
                                            </div>
                                            <form id="frm-user-edit"> 
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nome</label>
                                                        <input type="text" name="edtName" class="form-control" value="<?php echo $u->current()->user_name; ?>" maxlength="100" required>
                                                        <input type="hidden" name="edtID"  value="<?php echo $u->current()->id ?>">
                                                    </div>
                                                </div>                  
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="edtEmail" class="form-control" value="<?php echo $u->current()->user_email; ?>" maxlength="100" required>
                                                    </div>
                                                </div>                  
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Login</label>
                                                        <input type="text" name="edtLogin" class="form-control" value="<?php echo $u->current()->user_login; ?>" maxlength="50" required>
                                                    </div>
                                                </div>                  
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Senha</label>
                                                        <div class="pull-right">
                                                            <input type="checkbox" id="cbkUpdatePass"> <small for="cbkUpdatePass">Alterar senha</small>
                                                        </div>
                                                        <input type="password" name="edtPass" class="form-control" id="inputPass" placeholder="Digite uma senha com o máx 10 caractéres" maxlength="10">
                                                    </div>
                                                </div>     
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nível</label>
                                                    <select name="cmbLevel" class="form-control select2" id="cmb-level" require>
                                                        <option value="">Selecione...</option>
                                                        <option value="2">Básico</option>
                                                        <option value="1">Administrador</option>                                                        
                                                    </select>
                                                </div>
                                            </div>               
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn bg-green pull-right">Atualizar <i class="fa fa-save"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <?php $this->load->view('admin/include/footer/footer'); ?>
                <div class="control-sidebar-bg"></div>
            </div>
            <!-- ./wrapper -->    
            <?php $this->load->view('admin/include/scripts/script.php'); ?>
            <script>
                $(function () {
                    $(".mnmn-config").addClass("active");
                    $("#cmb-level").val("<?php echo $u->current()->user_level; ?>");
                });
            </script>
            <?php
            $u->next();
        endwhile;
        ?>
    </body>
</html>
