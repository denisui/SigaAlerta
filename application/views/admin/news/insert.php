<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Painel Administrativo .: Sigalerta | Notícias :.</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->load->view('admin/include/styles/style.php'); ?>
    </head>

    <body class="hold-transition skin-blue sidebar-mini fixed">
        <div class="wrapper">
            <?php $this->load->view('admin/include/header/header'); ?>
            <?php $this->load->view('admin/include/main-menu/main-menu'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/dashboard">
                                <i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/news">Notícia</a>
                        </li>
                        <li class="active">Inserir</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="gap-50"></div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Cadastro de Notícia</h3>
                                </div>
                                <hr>
                                <div class="box-body">
                                    <div class="row">
                                        <form id="frm-news-insert">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Título</label>
                                                    <input type="text" name="edtTitle" class="form-control" maxlength="200" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Categoria</label>
                                                    <select name="cmbCategory" class="form-control select2" style="width: 100%;" required>
                                                        <?php 
                                                        if (empty($category)) :
                                                        ?>
                                                        <option selected disabled>Nenhum registros encontrado</option>
                                                        <?php
                                                        else :
                                                            ?>
                                                        <option value="" selected disabled>Selecione...</option>
                                                        <?php
                                                            $c = new ArrayIterator($category);
                                                            while ($c->valid()):
                                                            ?>
                                                        <option value="<?php echo $c->current()->nc_title; ?>">
                                                            <?php echo $c->current()->nc_title; ?>
                                                        </option>
                                                        <?php 
                                                            $c->next();
                                                            endwhile;
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Destaque?</label>
                                                    <br>
                                                    <select name="cmbFeatured" class="form-control select2" style="width: 100%;" required>
                                                        <option selected disabled>Selecione...</option>
                                                        <option>Sim</option>
                                                        <option>Não</option>
                                                    </select>
                                                </div>
                                            </div>-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Descricao da Postagem</label>
                                                    <textarea name="txtDesc" id="txt01" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Imagem</label>
                                                <!-- Upload Button -->
                                                <input id="file-1" type="file" name="image" accept="image/*" class="file-loading">
                                                <br />
                                                <br />
                                            </div>
                                            <div class="col-md-12">
                                                <ul class="list-inline pull-right">
                                                    <li>
                                                        <button type="reset" class="btn bg-default">Cancelar
                                                            <i class="fa fa-circle-o"></i>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="submit" class="btn bg-green">Salvar
                                                            <i class="fa fa-save"></i>
                                                        </button>
                                                    </li>
                                                </ul>
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
            $(function() {
                $(".mnmn-news").addClass("active");
                /* File Input - Drag & Drop */
                $("#file-1").fileinput({
                    language: 'pt-BR',
                    allowedFileExtensions: ['jpg', 'png', 'gif'],
                    overwriteInitial: false,
                    uploadAsync: true,
                    browseLabel: "Procurar",
                    browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
                    maxFileSize: 2000,
                    maxFilesNum: 1,
                    showUpload: false
                });    

                //Initialize Select2 Elements
                $('.select2').select2();
            });
        </script>

    </body>

</html>