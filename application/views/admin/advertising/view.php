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
                        <li class="active">Advertising</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="gap-50"></div>
                            <div class="box box-default">
                                <div class="box-header">
                                    <h3 class="box-title">Advertising Cadastrados</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo base_url(); ?>admin/advertising/insert" class="btn bg-green pull-right">Cadastrar
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gap-20"></div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Cod.</th>
                                                <th style="width: 25%;">Título</th>
                                                <th style="width: 15%;">Página</th>
                                                <th style="width: 25%;">Tipo</th>
                                                <th>Imagem</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($advertising)) :
                                               //
                                            else :
                                                $a = new ArrayIterator($advertising);
                                                while ($a->valid()) :
                                                    ?>
                                            <tr>
                                                <td>
                                                   # <?php echo $a->current()->id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $a->current()->ads_title; ?>
                                                </td>
                                                <td>
                                                    <?php echo $a->current()->ads_page; ?>
                                                </td>
                                                <td>
                                                    <?php echo $a->current()->ads_type; ?>
                                                </td>
                                                <td>
                                                    <img src="<?php echo base_url() ?>assets/public/img/advertising/<?php echo $a->current()->ads_img; ?>" width="50" height="50">
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>admin/advertising/update/<?php echo $a->current()->id; ?>" class="btn btn-sm bg-yellow" title="Edit"><i class="fa fa-pen"></i></a>
                                                    <button type="button" class="btn btn-sm bg-red btn-delete-advertising" data-id="<?php echo $a->current()->id; ?>" title="Delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                                    $a->next();
                                                endwhile;
                                            endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
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
                $('#example1').DataTable({
                    "oLanguage": {
                        "sProcessing": "Aguarde enquanto os dados são carregados ...",
                        "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                        "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
                        "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
                        "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                        "sInfoFiltered": "",
                        "sSearch": "Procurar",
                        "oPaginate": {
                            "sFirst": "Primeiro",
                            "sPrevious": "Anterior",
                            "sNext": "Próximo",
                            "sLast": "Último"
                        }
                    }
                });
            });
        </script>        
    </body>

</html>