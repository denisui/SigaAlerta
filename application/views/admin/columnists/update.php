<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Painel Administrativo .: Sigalerta | Colunas - Update :.</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->load->view('admin/include/styles/style.php'); ?>   
    </head>

    <body class="hold-transition skin-blue sidebar-mini fixed">
        <?php
        $c = new ArrayIterator($data_col);
        if ($c) :
            while ($c->valid()) :
                ?>
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
                            <a href="<?php echo base_url(); ?>admin/news">Matéria</a>
                        </li>
                        <li class="active">Update</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="gap-50"></div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Alterando Notícia</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <form id="frm-columnists-update">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Título</label>
                                                    <input type="text" name="edtTitle" class="form-control" maxlength="60" value="<?php echo $c->current()->col_title; ?>" required>
                                                    <input type="hidden" name="edtID" value="<?php echo $c->current()->id; ?>">
                                                </div>
                                            </div>                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Descricao da Postagem</label>
                                                    <textarea name="txtDesc" id="txt01" required><?php echo $c->current()->col_description; ?></textarea>
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
                                                        <button type="submit" class="btn bg-green">Publicar
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

            <?php $this->load->view('admin/include/footer/footer.php'); ?>
            
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <?php $this->load->view('admin/include/scripts/script.php'); ?>
        <script>
            $(function() {
                $(".mnmn-columnists").addClass("active");
                //input date
                $('.input-date').datetimepicker({
                    lang: 'pt-BR',
                    timepicker: false,
                    format: 'm/d/Y',
                    formatDate: 'Y/m/d'
                });
                /* File Input - Drag & Drop */
                $("#file-1").fileinput({
                    language: 'pt-BR',
                    allowedFileExtensions: ['jpg', 'png', 'gif'],
                    initialPreview: [
                        "<?php echo base_url() . 'assets/public/images/columnists/' . $c->current()->col_img; ?>"
                    ],
                    initialPreviewAsData: true,
                    overwriteInitial: true,
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
        <?php
            $c->next();
            endwhile;
        endif;
        ?>
    </body>

</html>