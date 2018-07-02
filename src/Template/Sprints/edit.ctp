<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sprint $sprint
 */
?>
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <div class="breadcrumb">
    <strong>Sprints</strong>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <?= $this->Form->create($sprint) ?>
          <fieldset>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <?php
                    echo $this->Form->control('title', ['label' => 'Título', 'required' => 'true', 'class' => 'form-control']);
                  ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <?php
                    echo $this->Form->control('description', ['label' => 'Descrição', 'type' => 'textarea', 'required' => 'true', 'class' => 'form-control']);
                  ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Data Inicial</label>
                  <input type="date" name="initial_date" class="form-control" required value="<?= date('Y-m-d', strtotime($sprint->initial_date)) ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Data Final</label>
                  <input type="date" name="final_date" class="form-control" required value="<?= date('Y-m-d', strtotime($sprint->final_date)) ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Situação</label>
                  <select class="form-control" required name="status">
                    <option value="">Selecionar</option>
                    <option value="Novo" <?php if($sprint->status == 'Novo') { echo 'selected'; } ?>>Novo</option>
                    <option value="Em Andamento" <?php if($sprint->status == 'Em Andamento') { echo 'selected'; } ?>>Em Andamento</option>
                    <option value="Fechado" <?php if($sprint->status == 'Fechado') { echo 'selected'; } ?>>Fechado</option>
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
