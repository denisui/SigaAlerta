<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Painel Administrativo .: Simon's Auto Body | Notícias - Update :.</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->load->view('admin/include/styles/style.php'); ?>   
    </head>

    <body class="hold-transition skin-blue sidebar-mini fixed">
        <?php
        $n = new ArrayIterator($data_news);
        if ($n) :
            while ($n->valid()) :
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
                            <a href="<?php echo base_url(); ?>admin/news">Notícias</a>
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
                                        <form id="frm-news-update">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Título</label>
                                                    <input type="text" name="edtTitle" class="form-control" maxlength="45" value="<?php echo $n->current()->new_title; ?>" required>
                                                    <input type="hidden" name="edtID" value="<?php echo $n->current()->id; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Subtítulo</label>
                                                    <input type="text" name="edtSubtitle" class="form-control" maxlength="80" value="<?php echo $n->current()->new_subtitle; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Categoria</label>
                                                    <select name="cmbCategory" class="form-control select2" id="cmb-category" style="width: 100%;" required>
                                                        <?php 
                                                        if (empty($category)) :
                                                        ?>
                                                        <option selected disabled>Nenhum registros encontrado</option>
                                                        <?php
                                                        else :
                                                            ?>
                                                        <option selected disabled>Selecione...</option>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Agendar data de Postagem</label>
                                                    <br>
                                                    <input type="text" name="edtDate" class="form-control input-date" value="<?php echo $n->current()->new_agend_date_post; ?>" placeholder="Opcional" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Descricao da Postagem</label>
                                                    <textarea name="txtDesc" id="txt01" required><?php echo $n->current()->new_description; ?></textarea>
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

            <?php $this->load->view('admin/include/footer/footer.php'); ?>
            
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <?php $this->load->view('admin/include/scripts/script.php'); ?>
        <script>
            $(function() {
                $(".mnmn-news").addClass("active");

                //input date
                $('.input-date').datetimepicker({                    
                    lang: 'pt-BR',
                    formatTime:'H:i',
                    formatDate:'d/m/Y',
                    format: 'Y-m-d H:i',
                    //defaultDate:'8.12.1986', // it's my birthday
                    //defaultDate:'+03.01.1970', // it's my birthday
                    defaultTime:'01:00',
                    timepickerScrollbar:true
                });

                /* File Input - Drag & Drop */
                $("#file-1").fileinput({
                    language: 'pt-BR',
                    allowedFileExtensions: ['jpg', 'png', 'gif'],
                    initialPreview: [
                        "<?php echo base_url() . 'assets/public/images/news/' . $n->current()->new_img; ?>"
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

                /*$("#cmb-featured").val("<?php echo $n->current()->new_featured; ?>");*/
                $("#cmb-category").val("<?php echo $n->current()->new_category; ?>");
                //Initialize Select2 Elements
                $('.select2').select2();
            });
        </script>        
        <?php
            $n->next();
            endwhile;
        endif;
        ?>
    </body>

</html>