<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Painel Administrativo - Sigalerta .: Serviço :.</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->load->view('admin/include/styles/style.php'); ?>   
    </head>

    <body class="hold-transition skin-blue sidebar-mini fixed">
        <?php
        $f = new ArrayIterator($data_for_home);
        if ($f) :
            while ($f->valid()) :
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
                            Serviço
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
                                    <h3 class="box-title">Alterando registro</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <form id="frm-forhome-update">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nome</label>
                                                    <input type="text" name="edtName" value="<?php echo $f->current()->fh_name; ?>" class="form-control" maxlength="200" required>
                                                    <input type="hidden" name="edtID" value="<?php echo $f->current()->id; ?>">
                                                </div>
                                            </div>                      
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Categoria</label>
                                                    <br>
                                                    <select name="cmbCategory" class="form-control select2" id="cmd-category" style="width: 100%;" required>
                                                        <option selected disabled>Selecione...</option>
                                                        <option value="Construção">Construção</option>
                                                        <option value="Jardinagem e Paisagismo">Jardinagem e Paisagismo</option>
                                                        <option value="Móveis">Móveis</option>
                                                        <option value="Eletrecista">Eletrecista</option>
                                                        <option value="Encanadores">Encanadores</option>
                                                        <option value="Pintura">Pintura</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Endereço</label>
                                                    <input type="text" name="edtAddress" value="<?php echo $f->current()->fh_address; ?>" class="form-control" maxlength="100" required>
                                                </div>
                                            </div>  
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Descrição da Postagem</label>
                                                    <textarea name="txtDesc" id="txt01" required><?php echo $f->current()->fh_description; ?></textarea>
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
                $(".mnmn-forhome").addClass("active");
             
                /* File Input - Drag & Drop */
                $("#file-1").fileinput({
                    language: 'pt-BR',
                    allowedFileExtensions: ['jpg', 'png', 'gif'],
                    initialPreview: [
                        "<?php echo base_url() . 'assets/public/images/forhome/' . $f->current()->fh_img; ?>"
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
                            
                $("#cmd-category").val("<?php echo $f->current()->fh_category; ?>");
                //Initialize Select2 Elements
                $('.select2').select2();
            });
        </script>        
        <?php
            $f->next();
            endwhile;
        endif;
        ?>
    </body>

</html>