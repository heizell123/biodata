<?php $class1 = $menu_profile=='Profile'?'class="active"':''; ?>
<?php $class2 = $menu_profile=='Personal Info'?'class="active"':''; ?>
<?php $class3 = $menu_profile=='Document'?'class="active"':''; ?>
<?php $class4 = $menu_profile=='Setting'?'class="active"':''; ?>
<li <?= $class1 ?>><a href="<?= base_url()?>/my-account/profile" >Profile </a></li>
<li <?= $class2 ?>><a href="<?= base_url()?>/my-account/profile/info" >Personal Info</a></li>
<li <?= $class3 ?>><a href="<?= base_url()?>/my-account/profile/document" >Document</a></li>
<li <?= $class4 ?>><a href="<?= base_url()?>/my-account/profile/setting">Setting</a></li>