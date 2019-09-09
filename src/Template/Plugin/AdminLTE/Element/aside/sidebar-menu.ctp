<ul class="sidebar-menu" data-widget="tree">
  
  <li class="header">Cadastros</li>

  <li>
    <a href="<?= $this->Url->build(["controller" => "distribuidores", "action" => "index"]); ?>">
      <i class="fa fa-bug"></i> <span>Distribuidor</span>
    </a>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-industry"></i> <span>Checklist</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>

    <ul class="treeview-menu">
      <li>
        <a href="<?= $this->Url->build(["controller" => "respostas", "action" => "distribuidores"]); ?>"><i class="fa fa-circle-o"></i> Respostas de Checklists
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>
      <li>
        <a href="<?= $this->Url->build(["controller" => "checklists", "action" => "index"]); ?>"><i class="fa fa-circle-o"></i> Criação de Checklists
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>
      <li>
        <a href="<?= $this->Url->build(["controller" => "tiporespostas", "action" => "index"]); ?>"><i class="fa fa-circle-o"></i> Tipos de Respostas
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>
    </ul>
    
  </li>

  <li><a href="<?php echo $this->Url->build('/pages/debug'); ?>"><i class="fa fa-bug"></i> <span>Debug</span></a></li>
</ul>