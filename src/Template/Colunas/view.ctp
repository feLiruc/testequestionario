<section class="content-header">
  <h1>
    Coluna
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
            <dd><?= h($coluna->descricao) ?></dd>
            <dt scope="row"><?= __('Checklist') ?></dt>
            <dd><?= $coluna->has('checklist') ? $this->Html->link($coluna->checklist->id, ['controller' => 'Checklists', 'action' => 'view', $coluna->checklist->id]) : '' ?></dd>
            <dt scope="row"><?= __('Tiporesposta') ?></dt>
            <dd><?= $coluna->has('tiporesposta') ? $this->Html->link($coluna->tiporesposta->id, ['controller' => 'Tiporespostas', 'action' => 'view', $coluna->tiporesposta->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($coluna->id) ?></dd>
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
          <h3 class="box-title"><?= __('Respostas') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($coluna->respostas)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Distribuidor Id') ?></th>
                    <th scope="col"><?= __('Coluna Id') ?></th>
                    <th scope="col"><?= __('Linha Id') ?></th>
                    <th scope="col"><?= __('Valor') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($coluna->respostas as $respostas): ?>
              <tr>
                    <td><?= h($respostas->id) ?></td>
                    <td><?= h($respostas->distribuidor_id) ?></td>
                    <td><?= h($respostas->coluna_id) ?></td>
                    <td><?= h($respostas->linha_id) ?></td>
                    <td><?= h($respostas->valor) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Respostas', 'action' => 'view', $respostas->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Respostas', 'action' => 'edit', $respostas->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Respostas', 'action' => 'delete', $respostas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respostas->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
