<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">                        
            <div class="pull-left info no-padding" style="position: static;">
                <div class="gap-20"></div>
                <p><?php echo $name; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu gap-10">
            <li class="header">Menu</li>
            <li class="treeview mnmn-dash">
                <a href="<?php echo base_url(); ?>admin/dashboard">
                    <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview mnmn-news">
                <a href="<?php echo base_url(); ?>admin/news">
                    <i class="fa fa-book"></i> <span>Notícias</span>
                </a>
            </li>
            <li class="treeview mnmn-service">
                <a href="<?php echo base_url(); ?>admin/service">
                    <i class="fa fa-dice-five"></i> <span>Serviços</span>
                </a>
            </li>               
            <li class="treeview mnmn-columnists">
                <a href="<?php echo base_url(); ?>admin/columnists">
                    <i class="fa fa-home"></i> <span>Coluna de Notícia</span>
                </a>
            </li>               
            <li class="treeview mnmn-classified">
                <a href="<?php echo base_url(); ?>admin/classified">
                    <i class="fa fa-newspaper"></i> <span>Classificados</span>
                </a>
            </li>               
            <li class="treeview mnmn-ads">
                <a href="<?php echo base_url(); ?>admin/advertising">
                    <i class="far fa-newspaper"></i> <span>Advertising</span>
                </a>
            </li>               
            <?php 
                $session = $this->session->userdata('session');
                if (($session->user_level === '0') || ($session->user_level === '1')) :
            ?>
            <li class="treeview mnmn-config">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Configuração</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">                    
                    <li><a href="<?php echo base_url(); ?>admin/user"><i class="fa fa-check-circle"></i> Usuário</a></li>
                </ul>
            </li>            
            <?php
                endif;
            ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>