<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Gerenciador';
?>
<!DOCTYPE html>
<head>
  <?= $this->Html->charset() ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>
      <?= $cakeDescription ?>
  </title>
  <?= $this->Html->meta('icon') ?>

  <!-- Bootstrap core CSS-->
  <?= $this->Html->css('bootstrap.min.css') ?>
  <!-- Custom fonts for this template-->
  <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
  <!-- Page level plugin CSS-->
  <?= $this->Html->css('dataTables.bootstrap4.css') ?>
  <!-- Custom styles for this template-->
  <?= $this->Html->css('sb-admin.css') ?>

  <!-- Bootstrap core JavaScript-->
  <?= $this->Html->script('jquery/jquery.min.js') ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>

  <style type="text/css">
    .navbar-dark .navbar-toggler {
      border: 0 !important;
    }
  </style>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/projects">Gerenciador</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Página Inicial">
          <a class="nav-link" href="/projects">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Página Inicial</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Meus Dados">
          <a class="nav-link" href="/myaccount/<?= $loggedIn['id']; ?>">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Meus Dados</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuários">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#users" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Usuários</span>
          </a>
          <ul class="sidenav-second-level collapse" id="users">
            <li>
              <?= $this->Html->link('Novo', [
                  'controller' => 'Users',
                  'action' => 'add',
              ]) ?>
            </li>
            <li>
              <?= $this->Html->link('Listar', [
                  'controller' => 'Users',
                  'action' => 'index',
              ]) ?>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Projetos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#projects" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Projetos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="projects">
            <li>
              <?= $this->Html->link('Novo', [
                  'controller' => 'Projects',
                  'action' => 'add',
              ]) ?>
            </li>
            <li>
              <?= $this->Html->link('Listar', [
                  'controller' => 'Projects',
                  'action' => 'index',
              ]) ?>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/users/logout"><i class="fa fa-fw fa-sign-out"></i>Sair</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <?= $this->Flash->render() ?>
    </div>
    <?= $this->fetch('content') ?>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
      </div>
    </div>
  </footer>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <?= $this->Html->script('bootstrap.bundle.min.js') ?>
  <!-- Core plugin JavaScript-->
  <?= $this->Html->script('jquery-easing/jquery.easing.min.js') ?>
  <!-- Page level plugin JavaScript-->
  <?= $this->Html->script('chart.js/Chart.min.js') ?>
  <?= $this->Html->script('jquery.dataTables.js') ?>
  <?= $this->Html->script('dataTables.bootstrap4.js') ?>
  <!-- Custom scripts for all pages-->
  <?= $this->Html->script('sb-admin.min.js') ?>
  <!-- Custom scripts for this page-->
  <?= $this->Html->script('sb-admin-datatables.min.js') ?>
  <?= $this->Html->script('sb-admin-charts.min.js') ?>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#dataTable1').dataTable();
      $('#dataTable2').dataTable();
    } );
  </script>

</div>
</body>
</html>
