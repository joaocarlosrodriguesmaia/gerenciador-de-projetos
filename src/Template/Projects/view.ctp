<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
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
          title: '<?= h($project->title) ?>',
          start: '<?= date("Y-m-d", strtotime($project->initial_date)) ?>',
          end: '<?= date("Y-m-d", strtotime($project->final_date)) ?>'
        },
        <?php foreach ($project->sprints as $sprints) { ?>
        {
          title: '<?= h($sprints->title) ?>',
          start: '<?= date("Y-m-d", strtotime($sprints->initial_date)) ?>',
          end: '<?= date("Y-m-d", strtotime($sprints->final_date)) ?>'
        },
        <?php } ?>
      ]
    });

  });
</script>

<style type="text/css">
  .modalDialog {
    /*Insira o código debaixo de tudo*/
    /* overflow: scroll; */
    max-height: calc(100vh - 210px);
    overflow-y: auto;
  }

  ul li {
     list-style-type: none;
  }
</style>

<?php
foreach($users as $user):
  $username[$user->id] = $user->name;
endforeach;
?>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <div class="breadcrumb">
    <strong>Projetos</strong>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <fieldset>
          <legend>
            <?= __('Projetos') ?>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#calendar-modal">
              <i class="fa fa-calendar"></i> Calendário
            </button>
            <button type="button" class="btn btn-link pull-right" data-toggle="modal" data-target="#messages">
              <i class="fa fa-comments-o"></i> Mensagens
            </button>
          </legend>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Título</label>
                <input type="text" disabled name="" class="form-control" value="<?= h($project->title) ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Descrição</label>
                <textarea name="name" disabled class="form-control" rows="8" cols="80"><?= h($project->description) ?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Data Inicial</label>
                <input type="text" name="" class="form-control" disabled value="<?= date('d/m/Y', strtotime($project->initial_date)) ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Data de Entrega</label>
                <input type="text" name="" class="form-control" disabled  value="<?= date('d/m/Y', strtotime($project->final_date)) ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Situação</label>
                <input type="text" name="" class="form-control" disabled  value="<?= h($project->status) ?>">
              </div>
            </div>
          </div>
      </fieldset>

      <br/>

      <div class="row">
        <div class="col-md-10">
          <h4>Sprints</h4>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#new-sprint">
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
                <th>Título</th>
                <th>Data Final</th>
                <th>Situação</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data Final</th>
                <th>Situação</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($project->sprints as $sprints): ?>
              <tr>
                <td><?= h($sprints->id) ?></td>
                <td><?= h($sprints->title) ?></td>
                <td><?= date('d/m/Y', strtotime($sprints->final_date)) ?></td>
                <td><?= h($sprints->status) ?></td>
                <td class="actions text-center">
                  <?= $this->Html->link(__('Visualizar'), ['controller' => 'Sprints', 'action' => 'view', $sprints->id]) ?>
                  <?= $this->Html->link(__('Editar'), ['controller' => 'Sprints', 'action' => 'edit', $sprints->id]) ?>
                  <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Sprints', 'action' => 'delete', $sprints->id], ['confirm' => __('Tem certeza de que deseja excluir?', $sprints->id)]) ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <br/>
        <br/>

      <div class="row">
        <div class="col-md-10">
          <h4>Documentos</h4>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#new-documents">
            Novo
          </button>
        </div>
      </div>

      <br/>

      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Título</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Título</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($project->documents as $document): ?>
              <tr>
                <td><?= h($document->id) ?></td>
                <td><?= h($document->title) ?></td>
                <td class="actions text-center">
                  <a href="/img/uploads/<?= h($document->file) ?>" target="_blank">Baixar</a>
                  <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Documents', 'action' => 'delete', $document->id], ['confirm' => __('Tem certeza de que deseja excluir?', $document->id)]) ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <br/>
        <br/>

      <div class="row">
        <div class="col-md-10">
          <h4>Usuários</h4>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#new-users">
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
                <th>Usuário</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($project->project_users as $projectUsers): ?>
              <tr>
                <td><?= h($projectUsers->id) ?></td>
                <td><?= $username[$projectUsers->user_id] ?></td>
                <td class="actions text-center">
                  <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Projects', 'action' => 'deleteUser', $projectUsers->user_id], ['confirm' => __('Tem certeza de que deseja excluir?', $projectUsers->user_id)]) ?>
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

<!-- Messages -->
<div class="modal fade" id="messages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensagens</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modalDialog">
        <ul class="chat container">
          <?php foreach($project->messages as $message): ?>
            <?php if($message->user_id == $loggedIn['id']) { ?>
              <li class="right clearfix">
                <div class="chat-body clearfix">
                  <div class="header">
                    <small class=" text-muted">
                      <i class="fa fa-clock-o fa-fw"></i> <?= date('d/m/Y H:i', strtotime($message->created_at)) ?>
                    </small>
                    <strong class="pull-right primary-font"><?= $loggedIn['name']; ?></strong>
                  </div>
                  <p>
                    <?= h($message->description) ?>
                  </p>
                  </div>
              </li>
            <?php } else { ?>
              <li class="left clearfix">
                <div class="chat-body clearfix">
                  <div class="header">
                    <strong class="primary-font"><?= $username[$message->user_id] ?></strong>
                    <small class="pull-right text-muted">
                        <i class="fa fa-clock-o fa-fw"></i> <?= date('d/m/Y H:i', strtotime($message->created_at)) ?>
                    </small>
                  </div>
                  <p>
                    <?= h($message->description) ?>
                  </p>
                </div>
              </li>
            <?php } ?>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="modal-footer">
        <form id="form-messages" class="container-fluid" action="/messages/add" method="post" autocomplete="off">
          <div class="col-md-12">
            <input type="hidden" name="user_id" value="<?= $loggedIn['id']; ?>">
            <input type="hidden" name="project_id" value="<?= h($project->id) ?>">
            <input type="hidden" name="title" value="<?= h($project->title) ?>">
            <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s') ?>">
            <input type="text" class="form-control" name="description" required placeholder="Mensagem"/>
          </div>
        </form>
        <button class="btn btn-warning" id="btn-chat" onclick="document.getElementById('form-messages').submit();">
          Enviar
        </button>
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

<!-- New Sprints -->
<div class="modal fade" id="new-sprint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sprints</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-sprint" action="/sprints/add" method="post" autocomplete="off">
          <input type="hidden" name="project_id" class="form-control" required value="<?= h($project->id) ?>">
          <input type="hidden" name="status" class="form-control" required value="Novo">
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
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Data Inicial</label>
                <input type="date" name="initial_date" class="form-control" required value="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Data Final</label>
                <input type="date" name="final_date" class="form-control" required value="">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="document.getElementById('form-sprint').submit();" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- New Documents -->
<div class="modal fade" id="new-documents" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Documentos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-documents" action="/documents/add" method="post" enctype="multipart/form-data" autocomplete="off">
          <input type="hidden" name="project_id" class="form-control" required value="<?= h($project->id) ?>">
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
                <label for="">Arquivo</label>
                <input type="file" name="file" class="form-control" required/>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="document.getElementById('form-documents').submit();" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- New Users -->
<div class="modal fade" id="new-users" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuários</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-users" action="/project-users/add" method="post" enctype="multipart/form-data" autocomplete="off">
          <input type="hidden" name="project_id" class="form-control" required value="<?= h($project->id) ?>">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Usuários</label>
                <select class="form-control" required name="user_id">
                  <option value="">Selecionar</option>
                  <?php foreach ($users as $key => $user) { ?>
                    <option value="<?= $user->id ?>"><?= $user->name ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="document.getElementById('form-users').submit();" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
