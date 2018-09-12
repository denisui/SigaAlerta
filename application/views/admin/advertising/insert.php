<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel Administrativo - Sigalerta .: Advertising :.</title>
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
                        <a href="<?php echo base_url(); ?>admin/advertising">Advertising</a>
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
                                <h3 class="box-title">Cadastro de Advertising</h3>
                            </div>
                            <hr>
                            <div class="box-body">
                                <div class="row">
                                    <form id="frm-advertising-insert">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Título</label>
                                                <input type="text" name="edtTitle" class="form-control" maxlength="200" placeholder="Ex: Banner" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Página de exibição</label>
                                                <br>
                                                <select name="cmbPage" class="form-control select2" id="cmd-page" style="width: 100%;" required>
                                                    <option selected disabled>Selecione...</option>
                                                    <option value="Home">Home</option>
                                                    <option value="Notícias Locais">Notícias Locais</option>
                                                    <option value="Local">Local</option>
                                                    <option value="Estados Unidos">Estados Unidos</option>
                                                    <option value="Mundo">Mundo</option>
                                                    <option value="Política">Política</option>
                                                    <option value="Clima">Clima</option>
                                                    <option value="Tecnologia">Tecnologia</option>
                                                    <option value="Entretenimento">Entretenimento</option>
                                                    <option value="Moda">Moda</option>
                                                    <option value="Advogados">Advogados</option>
                                                    <option value="Guincho">Guincho</option>
                                                    <option value="Restaurantes Brasileiros">Restaurantes Brasileiros</option>
                                                    <option value="Agência de Seguros">Agência de Seguros</option>
                                                    <option value="PintDentistasura">Dentistas</option>
                                                    <option value="Loja de Carros">Loja de Carros</option>
                                                    <option value="Envio de Dinheiro para o Brasil">Envio de Dinheiro para o Brasil</option>
                                                    <option value="Academia e afins">Academia e afins</option>
                                                    <option value="Construção">Construção</option>
                                                    <option value="Jardinagem e Paisagismo">Jardinagem e Paisagismo</option>
                                                    <option value="Móveis">Móveis</option>
                                                    <option value="Eletrecistas">Eletrecistas</option>
                                                    <option value="Encanadores">Encanadores</option>
                                                    <option value="Pintura">Pintura</option>
                                                    <option value="Classificados">Classificados</option>
                                                    <option value="Tráfego">Tráfego</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipo</label>
                                                <br>
                                                <select name="cmbSize" class="form-control select2" id="cmd-size" style="width: 100%;" required>
                                                    <option value="">Selecione...</option>
                                                    <option value="1140x87">Horizontal (1140x87)</option>
                                                    <option value="555x88">Horizontal (555x88)</option>
                                                    <option value="263x293">Vertical (263x293)</option>
                                                    <option value="263x588">Vertical (263x588)</option>
                                                </select>
                                            </div>
                                        </div>          
                                        <div class="col-md-12">
                                            <h4>Agendamento</h4>
                                            <small>Informe a data de início e término que o anúncio será visualizado!</small>
                                            <hr>
                                        </div>                                          
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>De:</label>
                                                <input type="text" name="edtDateInitial" class="form-control input-date" placeholder="Opcional" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Até:</label>
                                                <input type="text" name="edtDateFinish" class="form-control input-date" placeholder="Opcional" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h4>Mídia</h4>
                                            <hr>
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
                $(".mnmn-ads").addClass("active");
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

                $('.input-date').datetimepicker({                    
                    lang: 'pt-BR',
                    timepicker: false,
                    format: 'Y/m/d',
                    formatDate: 'Y/m/d'
                });

                //Initialize Select2 Elements
                $('.select2').select2();
            });
        </script>

    </body>

</html>