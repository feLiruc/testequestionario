<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resposta $resposta
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Resposta
    <small><?php echo __('Edit'); ?></small>
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
            <dt scope="row">Nome do Distribuidor:</dt>
            <dd><?= $distribuidor->descricao ?></dd>
            <dt scope="row">Checklist:</dt>
            <dd><?= $checklist->descricao ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="box box-solid">

    <?php echo $this->Form->create($respostas, ['role' => 'form']); ?>
      <!-- /.box-body -->

      <div class="col-xs-4" style="padding-right:0px;">
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody>
              <tr style="height: 45px;">
                <th style="position: relative;">
                  <div style="position: absolute; right: 0; top: 50;">Respostas:</div>
                  <div style="width: 200px; text-align: center; margin-right:50%; position: absolute; left: 100px; bottom:0;">Questões:</div>
                </th>
              </tr>
              <?php for ($i=0; $i < $lines; $i++) { ?>
              <tr style="height: 45px;">
                <th class="text-center">
                  <?= $checklist->linhas[$i]->descricao ?>
                </th>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-xs-8 table-responsive" style="overflow-y:hidden;padding-left:0px;">

        <div class="box-body table-responsive no-padding">
          <style>
            .form-control{
              height: 28px !important;
              padding: 2px 5px;
            }
          </style>
          <table class="table table-hover">
            <tbody>
              <!-- TITULO DA TABELA DA DIREITA -->
              <tr style="height: 45px;">
                <?php for ($i=0; $i < $collumns; $i++) { ?>
                  <td class="text-center">
                    <b><?= $checklist->colunas[$i]->descricao ?></b>
                  </td>
                <?php } ?>
              </tr>
              <!-- END TITULO DA TABELA DA DIREITA -->
              <?php for ($i=0; $i < $lines; $i++) { ?>
                <tr style="height: 45px;">
                  <?php for ($j=0; $j < $collumns; $j++) { ?>
                  <td class="text-center">
                    <?php if($checklist->colunas[$j]->tiporesposta->opcoesrespostas){ ?>
                      <?php
                        $options = [];
                        foreach ($checklist->colunas[$j]->tiporesposta->opcoesrespostas as $key => $opcoesresposta)
                        {
                            $options[$opcoesresposta['id']] = $opcoesresposta['valor'];
                        }
                        echo $this->Form->control(($i*$collumns)+$j.'.valor', ['templates' => [
                          'inputContainer' => '<div>{{content}}</div>'
                        ], 'options' => $options, 'label' => false]);
                      ?>
                    <?php }else{ ?>
                      <?= $this->Form->control(($i*$collumns)+$j.'.valor', ['templates' => [
                        'inputContainer' => '<div>{{content}}</div>'
                      ], 'label' => false]) ?>
                    <?php } ?>

                    <!-- DADOS PADRÕES -->
                    <?php
                      echo $this->Form->control(($i*$collumns)+$j.'.id', ['type' => 'hidden']);  
                      echo $this->Form->control(($i*$collumns)+$j.'.distribuidor_id', ['type' => 'hidden', 'value' => $distribuidor->id]);
                      echo $this->Form->control(($i*$collumns)+$j.'.checklist_id', ['type' => 'hidden', 'value' => $checklist->id]);
                      echo $this->Form->control(($i*$collumns)+$j.'.linha_id', ['type' => 'hidden', 'value' =>$checklist->linhas[$i]->id ]);
                      echo $this->Form->control(($i*$collumns)+$j.'.coluna_id', ['type' => 'hidden', 'value' => $checklist->colunas[$j]->id]);
                    ?>
                    <!-- END DADOS PADRÕES -->
                  </td>
                <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

    <?php echo $this->Form->submit(__('Submit')); ?>

    <?php echo $this->Form->end(); ?>
  </div>
</section>

