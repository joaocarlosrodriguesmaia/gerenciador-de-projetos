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
                <label for="">Data de Início</label>
                <input type="date" class="form-control" name="initial_date" required/>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Data de Entrega</label>
                <input type="date" class="form-control" name="final_date" required/>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Situação</label>
                <select class="form-control" name="status" required>
                  <option value="Nova">Nova</option>
                </select>
              </div>
            </div>
          </div>
      </fieldset>
      <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-success']) ?>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
