<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Painel Administrativo .: Sigalerta | Dashboard :.</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->load->view('admin/include/styles/style'); ?>
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
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <div class="gap-50"></div>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="<?php echo base_url(); ?>assets/admin/img/beta.png" class="center-block" style="margin-top: 50px;" alt="">
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <?php $this->load->view('admin/include/footer/footer'); ?>

            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper --> 

        <?php $this->load->view('admin/include/scripts/script'); ?>  
        <script>
            $(function () {
                $(".mnmn-dash").addClass("active");                
            });
        </script>        
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
    </body>
</html>
