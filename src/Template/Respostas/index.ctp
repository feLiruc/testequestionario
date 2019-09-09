<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Respostas

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('distribuidor_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('coluna_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('linha_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($respostas as $resposta): ?>
                <tr>
                  <td><?= $this->Number->format($resposta->id) ?></td>
                  <td><?= $resposta->has('distribuidor') ? $this->Html->link($resposta->distribuidor->id, ['controller' => 'Distribuidores', 'action' => 'view', $resposta->distribuidor->id]) : '' ?></td>
                  <td><?= $resposta->has('coluna') ? $this->Html->link($resposta->coluna->id, ['controller' => 'Colunas', 'action' => 'view', $resposta->coluna->id]) : '' ?></td>
                  <td><?= $resposta->has('linha') ? $this->Html->link($resposta->linha->id, ['controller' => 'Linhas', 'action' => 'view', $resposta->linha->id]) : '' ?></td>
                  <td><?= h($resposta->valor) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $resposta->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resposta->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resposta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resposta->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>