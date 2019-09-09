<section class="content-header">
  <h1>
    Tiporesposta
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Descricao') ?></dt>
            <dd><?= h($tiporesposta->descricao) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($tiporesposta->id) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Colunas') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($tiporesposta->colunas)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Descricao') ?></th>
                    <th scope="col"><?= __('Checklist Id') ?></th>
                    <th scope="col"><?= __('Tiporesposta Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($tiporesposta->colunas as $colunas): ?>
              <tr>
                    <td><?= h($colunas->id) ?></td>
                    <td><?= h($colunas->descricao) ?></td>
                    <td><?= h($colunas->checklist_id) ?></td>
                    <td><?= h($colunas->tiporesposta_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Colunas', 'action' => 'view', $colunas->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Colunas', 'action' => 'edit', $colunas->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Colunas', 'action' => 'delete', $colunas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $colunas->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Opcoesrespostas') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($tiporesposta->opcoesrespostas)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Tiporesposta Id') ?></th>
                    <th scope="col"><?= __('Valor') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($tiporesposta->opcoesrespostas as $opcoesrespostas): ?>
              <tr>
                    <td><?= h($opcoesrespostas->id) ?></td>
                    <td><?= h($opcoesrespostas->tiporesposta_id) ?></td>
                    <td><?= h($opcoesrespostas->valor) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Opcoesrespostas', 'action' => 'view', $opcoesrespostas->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Opcoesrespostas', 'action' => 'edit', $opcoesrespostas->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Opcoesrespostas', 'action' => 'delete', $opcoesrespostas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $opcoesrespostas->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
