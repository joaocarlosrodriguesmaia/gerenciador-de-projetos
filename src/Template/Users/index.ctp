<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <div class="breadcrumb">
    <strong>Usuários</strong>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Usuário</th>
              <th></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Usuário</th>
              <th></th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
              <td><?= $this->Number->format($user->id) ?></td>
              <td><?= h($user->name) ?></td>
              <td><?= h($user->username) ?></td>
              <td class="actions text-center">
                  <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $user->id]) ?>
                  <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                  <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $user->id], ['confirm' => __('Tem certeza de que deseja excluir?', $user->id)]) ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
