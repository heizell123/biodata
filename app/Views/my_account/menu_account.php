<?php $class1 = $title=='Dashboard'?'class="active"':''; ?>
<?php $class2 = $title=='Profile'?'class="active"':''; ?>
<?php $class3 = $title=='My Application'?'class="active"':''; ?>
<?php $class4 = $title=='Saved Vacancy'?'class="active"':''; ?>
<li <?= $class1 ?>><a href="<?= base_url()?>/my-account" >Dashboard </a></li>
<li <?= $class2 ?>><a href="<?= base_url()?>/my-account/profile" >Profile</a></li>
<li <?= $class3 ?>><a href="<?= base_url()?>/my-account/my-application" >My Application</a></li>
<li <?= $class4 ?>><a href="<?= base_url()?>/my-account/saved-vacancy">Saved Vacancy</a></li>