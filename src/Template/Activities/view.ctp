<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */

 foreach($users as $user):
   $username[$user->id] = $user->name;
 endforeach;

?>
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <div class="breadcrumb">
    <strong>Atividades</strong>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label for="">Título</label>
            <input type="text" name="" class="form-control" disabled value="<?= h($activity->title) ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Sprint</label><br/>
            <?= $activity->has('sprint') ? $this->Html->link($activity->sprint->title, ['controller' => 'Sprints', 'action' => 'view', $activity->sprint->id]) : '' ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="">Descrição</label><br/>
            <textarea name="name"class="form-control" disabled  rows="8" cols="80"><?= h($activity->description) ?></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Prioridade</label><br/>
            <input type="text" name="" class="form-control" disabled value="<?= h($activity->priority) ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Progresso</label><br/>
            <input type="text" name="" class="form-control" disabled value="<?= $this->Number->format($activity->progress) ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Data Inicial</label><br/>
            <input type="text" name="" class="form-control" disabled value="<?= date('d/m/Y', strtotime($activity->initial_date)) ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Data Final</label><br/>
            <input type="text" name="" class="form-control" disabled value="<?= date('d/m/Y', strtotime($activity->final_date)) ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Situação</label><br/>
            <input type="text" name="" class="form-control" disabled value="<?= h($activity->status) ?>">
          </div>
        </div>
      </div>

      <br/>

      <div class="row">
        <div class="col-md-10">
          <h4>Tickets</h4>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#new-tickets">
            Novo
          </button>
        </div>
      </div>

      <br/>

      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Mensagem</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Mensagem</th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($activity->tickets as $tickets): ?>
              <tr>
                <td><?= h($tickets->id) ?></td>
                <td>
                  <strong>Usuário: </strong><?= $username[$tickets->user_id] ?><br/>
                  <strong>Título: </strong><?= h($tickets->title) ?><br/>
                  <strong>Descrição: </strong><br/>
                  <?= h($tickets->description) ?>
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

<!-- New Tickets -->
<div class="modal fade" id="new-tickets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tickets</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-tickets" action="/tickets/add" method="post" autocomplete="off">
          <input type="hidden" name="activity_id" class="form-control" required value="<?= h($activity->id) ?>">
          <input type="hidden" name="user_id" class="form-control" required value="<?= $loggedIn['id']; ?>">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Título</label>
                <input type="text" name="title" class="form-control" required value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Descrição</label>
                <textarea name="description" class="form-control" required rows="8" cols="80"></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="document.getElementById('form-tickets').submit();" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
