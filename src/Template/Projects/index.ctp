<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <div class="breadcrumb">
    <strong>Projetos</strong>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Situação</th>
              <th></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Situação</th>
              <th></th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
              <td><?= $this->Number->format($project->id) ?></td>
              <td><?= h($project->title) ?></td>
              <td><?= h($project->status) ?></td>
              <td class="actions text-center">
                  <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $project->id]) ?>
                  <?= $this->Html->link(__('Editar'), ['action' => 'edit', $project->id]) ?>
                  <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $project->id], ['confirm' => __('Tem certeza de que deseja excluir?', $project->id)]) ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
