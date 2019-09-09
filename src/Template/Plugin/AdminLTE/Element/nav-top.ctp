<?php use Cake\Core\Configure; ?>
<nav class="navbar navbar-static-top">

  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Menu</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li>
        <a href="<?= $this->Url->build(["controller" => "usuarios", "action" => "logout"]); ?>"><i class="fa fa-sign-out"></i></a>
      </li>
    </ul>
  </div>

  <?php if (isset($layout) && $layout == 'top'): ?>
  </div>
  <?php endif; ?>
</nav>