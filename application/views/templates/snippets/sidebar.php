<nav class="pcoded-navbar">
<div class="navbar-wrapper">
<div class="navbar-brand header-logo">
<a href="<?= site_url('Home'); ?>" class="b-brand">
<div class="b-bg">
<i class="feather icon-trending-up"></i>
</div>
<span class="b-title">Datta Able</span>
</a>
<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
</div>
<div class="navbar-content scroll-div">
<ul class="nav pcoded-inner-navbar">
<li class="nav-item pcoded-menu-caption text-center" style="font-size:14px;">
<label><a href="<?= site_url('Home'); ?>">DASHBOARD</a></label>
</li>

<?php echo $this->menu->dynamicMenu(); ?>


</ul>
</div>
</div>
</nav>