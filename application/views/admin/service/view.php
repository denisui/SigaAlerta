<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Painel Administrativo - Sigalerta .: Serviços :.</title>
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
                        <li class="active">Serviços</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="gap-50"></div>
                            <div class="box box-default">
                                <div class="box-header">
                                    <h3 class="box-title">Serviços Cadastrados</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo base_url(); ?>admin/service/insert" class="btn bg-green pull-right">Cadastrar
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gap-20"></div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Cod.</th>
                                                <th style="width: 25%;">Nome</th>
                                                <th style="width: 25%;">Tipo</th>
                                                <th>Imagem</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($data_service)) :
                                               //
                                            else :
                                                $s = new ArrayIterator($data_service);
                                                while ($s->valid()) :
                                                    ?>
                                            <tr>
                                                <td>
                                                    <?php echo $s->current()->id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $s->current()->serv_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $s->current()->serv_category; ?>
                                                </td>
                                                <td>
                                                    <img src="<?php echo base_url() ?>assets/public/images/services/<?php echo $s->current()->serv_img; ?>"
                                                        width="100" height="100">
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>admin/service/update/<?php echo $s->current()->id; ?>"
                                                        class="btn bg-yellow">
                                                        <i class="fa fa-pen"></i> Editar</a>
                                                    <button type="button" class="btn bg-red btn-delete-service" data-id="<?php echo $s->current()->id; ?>">
                                                        <i class="fa fa-trash"></i> Excluir</button>
                                                </td>
                                            </tr>
                                            <?php
                                                    $s->next();
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
                $(".mnmn-service").addClass("active");
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