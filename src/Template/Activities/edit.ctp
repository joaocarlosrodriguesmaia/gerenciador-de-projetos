<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
?>
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <div class="breadcrumb">
    <strong>Atividades</strong>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <?= $this->Form->create($activity) ?>
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
                echo $this->Form->control('description', ['label' => 'Título', 'type' => 'textarea', 'class' => 'form-control', 'required' => 'true']);
            ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Prioridade</label>
            <select class="form-control" required name="priority">
              <option value="">Selecionar</option>
              <option value="Normal" <?php if($activity->priority == 'Normal') { echo 'selected'; } ?>>Normal</option>
              <option value="Alta" <?php if($activity->priority == 'Alta') { echo 'selected'; } ?>>Alta</option>
              <option value="Baixa" <?php if($activity->priority == 'Baixa') { echo 'selected'; } ?>>Baixa</option>
              <option value="Urgente" <?php if($activity->priority == 'Urgente') { echo 'selected'; } ?>>Urgente</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Progesso</label>
            <select class="form-control" required name="progress">
              <option value="0" <?php if($activity->priority == '0') { echo 'selected'; } ?>>0%</option>
              <option value="10" <?php if($activity->priority == '10') { echo 'selected'; } ?>>10%</option>
              <option value="20" <?php if($activity->priority == '20') { echo 'selected'; } ?>>20%</option>
              <option value="30" <?php if($activity->priority == '30') { echo 'selected'; } ?>>30%</option>
              <option value="40" <?php if($activity->priority == '40') { echo 'selected'; } ?>>40%</option>
              <option value="50" <?php if($activity->priority == '50') { echo 'selected'; } ?>>50%</option>
              <option value="60" <?php if($activity->priority == '60') { echo 'selected'; } ?>>60%</option>
              <option value="70" <?php if($activity->priority == '70') { echo 'selected'; } ?>>70%</option>
              <option value="80" <?php if($activity->priority == '80') { echo 'selected'; } ?>>80%</option>
              <option value="90" <?php if($activity->priority == '90') { echo 'selected'; } ?>>90%</option>
              <option value="100" <?php if($activity->priority == '100') { echo 'selected'; } ?>>100%</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Data Inicial</label>
            <input type="date" name="initial_date" class="form-control" required value="<?= date('Y-m-d', strtotime($activity->initial_date)) ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Data Final</label>
            <input type="date" name="final_date" class="form-control" required value="<?= date('Y-m-d', strtotime($activity->final_date)) ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Situação</label>
            <select class="form-control" required name="status">
              <option value="Nova" <?php if($activity->priority == 'Nova') { echo 'selected'; } ?>>Nova</option>
              <option value="Em Andamento" <?php if($activity->priority == 'Em Andamento') { echo 'selected'; } ?>>Em Andamento</option>
              <option value="Fechada" <?php if($activity->priority == 'Fechada') { echo 'selected'; } ?>>Fechada</option>
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
    </div>
  </div>
</div>
