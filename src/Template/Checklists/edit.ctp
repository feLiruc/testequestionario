<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Checklist $checklist
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Checklist
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
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($checklist, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('descricao', ['label' => 'Título da Checklist:']);
              ?>
            </div>
            <!-- /.box-body -->

            <div class="col-xs-4" style="padding-right:0px;">
              <!-- Tabela com itens lateral esquerda -->
              <table class="table">
                <tr style="height: 163px;" class="text-right">
                  <td style="vertical-align: middle;font-weight: bold;font-size: 18px;">
                    Respostas:
                  </td>
                </tr>
                <tr style="height: 60px;">
                  <td style="text-align:center;vertical-align: bottom;font-weight: bold;font-size: 18px;">
                    <span>
                      Questões:
                    </span>
                  </td>
                </tr>
                <?php for ($i=0; $i < $lines; $i++) { ?>
                  <tr style="height: 60px;">
                    <td class="va-m text-center celula-new-2">
                      <div class="div-inner-td"><b class="text-right" style="font-size:18px;">
                        <?= $this->Form->control('linhas.'.$i.'.descricao', ['label' => false]); ?>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </table>

            </div>

            <div class="col-xs-8 table-responsive" style="overflow-y:hidden;padding-left:0px;">

              <table class="table table-hover ">

                <!-- Saldo Inicial -->

                <tr style="height: 60px;background-color: #f5f5f5;">
                  <?php for ($i=0; $i < $collumns; $i++) { ?>
                    <td style="min-width:250px;">
                      <?php
                        echo $this->Form->control('colunas.'.$i.'.descricao', ['label' => 'Nome da Coluna:']);
                      ?>
                      <?php
                        echo $this->Form->control('colunas.'.$i.'.tiporesposta_id', ['options' => $tiporespostas, 'label' => 'Tipo da Resposta']);
                      ?>
                    </td>
                  <?php } ?>
                </tr>
              </table>

            </div>

          <?php echo $this->Form->submit(__('Submit')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
