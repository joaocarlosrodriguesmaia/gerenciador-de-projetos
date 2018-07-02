<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sprint $sprint
 */
?>

<link href='/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='/fullcalendar/lib/moment.min.js'></script>
<script src='/fullcalendar/fullcalendar.min.js'></script>

<script type="text/javascript">
  $(document).ready(function() {

    $('#calendar').fullCalendar({
      defaultDate: '<?= date("Y-m-d") ?>',
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: '<?= h($sprint->title) ?>',
          start: '<?= date("Y-m-d", strtotime($sprint->initial_date)) ?>',
          end: '<?= date("Y-m-d", strtotime($sprint->final_date)) ?>'
        },
        <?php foreach ($sprint->activities as $activities) { ?>
        {
          title: '<?= h($activities->title) ?>',
          start: '<?= date("Y-m-d", strtotime($activities->initial_date)) ?>',
          end: '<?= date("Y-m-d", strtotime($activities->final_date)) ?>'
        },
        <?php } ?>
      ]
    });

  });
</script>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <div class="breadcrumb">
    <strong>Sprints</strong>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <legend>
        <?= __('Sprints') ?>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#calendar-modal">
          <i class="fa fa-calendar"></i> Calendário
        </button>
      </legend>
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label for="">Título</label>
            <input type="text" name="" class="form-control" disabled value="<?= h($sprint->title) ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Projeto</label><br/>
            <?= $sprint->has('project') ? $this->Html->link($sprint->project->title, ['controller' => 'Projects', 'action' => 'view', $sprint->project->id]) : '' ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="">Descrição</label>
            <textarea name="name" class="form-control" disabled rows="8" cols="80"><?= __('Description') ?></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Data Inicial</label>
            <input type="text" name="" class="form-control" disabled value="<?= date('d/m/Y', strtotime($sprint->initial_date)) ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Data Final</label>
            <input type="text" name="" class="form-control" disabled value="<?= date('d/m/Y', strtotime($sprint->final_date)) ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Situação</label>
            <input type="text" name="" class="form-control" disabled value="<?= h($sprint->status) ?>">
          </div>
        </div>
      </div>

      <br/>

      <div class="row">
        <div class="col-md-10">
          <h4>Atividades</h4>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#new-activities">
            Nova
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
                <th>Título</th>
                <th>Data Final</th>
                <th>Prioridade</th>
                <th>Progesso</th>
                <th>Situação</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data Final</th>
                <th>Prioridade</th>
                <th>Progesso</th>
                <th>Situação</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($sprint->activities as $activities): ?>
              <?php if($activities->sprint_id == $sprint->id) { ?>
              <tr>
                <td><?= h($activities->id) ?></td>
                <td><?= h($activities->title) ?></td>
                <td><?= date('d/m/Y', strtotime($activities->final_date)) ?></td>
                <td><?= h($activities->priority) ?></td>
                <td><?= h($activities->progress) ?>%</td>
                <td><?= h($activities->status) ?></td>
                <td class="actions text-center">
                  <?= $this->Html->link(__('Visualizar'), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?>
                  <?= $this->Html->link(__('Editar'), ['controller' => 'Activities', 'action' => 'edit', $activities->id]) ?>
                  <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Activities', 'action' => 'delete', $activities->id], ['confirm' => __('Tem certeza de que deseja excluir?', $activities->id)]) ?>
                </td>
              </tr>
              <?php } ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Calendar -->
<div class="modal fade" id="calendar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Calendário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="calendar"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- New Activities -->
<div class="modal fade" id="new-activities" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atividades</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-activities" action="/activities/add" method="post" autocomplete="off">
          <input type="hidden" name="sprint_id" class="form-control" required value="<?= h($sprint->id) ?>">
          <input type="hidden" name="user_id" class="form-control" required value="1">
          <input type="hidden" name="progress" class="form-control" required value="0">
          <input type="hidden" name="status" class="form-control" required value="Nova">
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
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Data Inicial</label>
                <input type="date" name="initial_date" class="form-control" required value="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Data Final</label>
                <input type="date" name="final_date" class="form-control" required value="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Prioridade</label>
                <select class="form-control" required name="priority">
                  <option value="">Selecionar</option>
                  <option value="Normal">Normal</option>
                  <option value="Alta">Alta</option>
                  <option value="Baixa">Baixa</option>
                  <option value="Urgente">Urgente</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="document.getElementById('form-activities').submit();" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
