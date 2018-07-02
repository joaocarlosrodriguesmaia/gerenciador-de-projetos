<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <div class="breadcrumb">
    <strong>Usuários</strong>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <strong>Nome Completo:</strong><br/>
          <input type="text" name="" class="form-control" disabled value="<?= h($user->name) ?>">
        </div>
        <div class="col-md-6">
          <strong>Nome de Usuário:</strong><br/>
          <input type="text" name="" class="form-control" disabled value="<?= h($user->username) ?>">
        </div>
      </div>

      <br/>

      <h4>Projetos</h4>

      <hr>

      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Projeto</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Projeto</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($user->project_users as $projectUsers): ?>
              <tr>
                <td><?= h($projectUsers->id) ?></td>
                <td><?= h($projectUsers->project_id) ?></td>
                <td class="actions text-center">
                  <?= $this->Html->link(__('Visualizar'), ['controller' => 'Projects', 'action' => 'view', $projectUsers->project_id]) ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <br/>

      <h4>Atividades</h4>

      <hr>

      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Prioridade</th>
                <th>Data de Entrega</th>
                <th>Progresso</th>
                <th>Situação</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Prioridade</th>
                <th>Data de Entrega</th>
                <th>Progresso</th>
                <th>Situação</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($user->activities as $activities): ?>
              <tr>
                <td><?= h($activities->id) ?></td>
                <td><?= h($activities->title) ?></td>
                <td><?= h($activities->priority) ?></td>
                <td><?= h($activities->final_date) ?></td>
                <td><?= h($activities->progress) ?></td>
                <td><?= h($activities->status) ?></td>
                <td class="actions text-center">
                  <?= $this->Html->link(__('Visualizar'), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
