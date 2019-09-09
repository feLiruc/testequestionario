<section class="content-header">
  <h1>
    Distribuidor
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
            <dd><?= h($distribuidor->descricao) ?></dd>
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
          <h3 class="box-title">Checklists</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if ($checklists): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Descricao') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($checklists as $checklist): ?>
              <tr>
                    <td><?= h($checklist->id) ?></td>
                    <td><?= h($checklist->descricao) ?></td>
                    <td class="actions text-center">
                      <?= $this->Html->link("Visualizar", ['controller' => 'respostas', 'action' => 'edit', $distribuidor->id, $checklist->id], ['class'=>'btn btn-info btn-xs']) ?>
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
