<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <div class="breadcrumb">
    <strong>Projetos</strong>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <?= $this->Form->create($project) ?>
      <fieldset>
          <legend><?= __('Projetos') ?></legend>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <?php
                  echo $this->Form->control('title', ['label' => 'Título', 'class' => 'form-control', 'required' => 'true']);
                ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <?php
                  echo $this->Form->control('description', ['label' => 'Descrição', 'type' => 'textarea', 'class' => 'form-control', 'required' => 'true']);
                ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Data Inicial</label>
                <input type="date" name="initial_date" class="form-control" required value="<?= date('Y-m-d', strtotime($project->initial_date)) ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Data Final</label>
                <input type="date" name="final_date" class="form-control" required value="<?= date('Y-m-d', strtotime($project->final_date)) ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Situação</label>
                <select class="form-control" name="status" required>
                  <option value="Nova">Nova</option>
                  <option value="Em Andamento">Em Andamento</option>
                  <option value="Fechada">Fechada</option>
                </select>
              </div>
            </div>
          </div>
      </fieldset>
      <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
