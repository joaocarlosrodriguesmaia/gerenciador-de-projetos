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
      <?= $this->Form->create($user) ?>
      <fieldset>
          <legend><?= __('Usuários') ?></legend>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <?php
                  echo $this->Form->control('name', ['label' => 'Nome Completo', 'class' => 'form-control', 'required' => 'true']);
              ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <?php
                  echo $this->Form->control('username', ['label' => 'Nome de Usuário', 'class' => 'form-control', 'required' => 'true']);
              ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
              <?php
                  echo $this->Form->control('password', ['label' => 'Senha', 'class' => 'form-control', 'required' => 'false', 'value' => '']);
              ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
              <?php
                  echo $this->Form->control('password_confirmation', ['label' => 'Confirmar Senha', 'type' => 'password', 'class' => 'form-control', 'required' => 'false']);
              ?>
              </div>
            </div>
          </div>
      </fieldset>
      <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
