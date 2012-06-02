<?php
$session = Session::instance();
$user_session = $session->get('user');
$user_cookie = Cookie::get('user');
if(!empty($user_session)): ?>
 
<div class="admin-content">
<h2><?= __('admincp') ?></h2>
<?php 
if(!empty($user_cookie)):
    echo __('cookie_set');
endif;
?>
<p><?= __('welcome_admincp') ?></p>
<p><?= __('precise_date_time') ?>  <?php echo date('d.m.Y H:i:s', time()); ?></p>
<p><a href="<?= URL::site('dashboard/sign_out') ?>">logout</a></p>
</div>
<?php elseif(!empty($user_cookie)):  ?>
<?php Session::instance()->set('user', $user_cookie); ?>
 <?php Request::current()->redirect('dashboard'); ?>
<?php else: ?>
<h2><?= __('admincp_title') ?></h2>
<h3>Login</h3>
<form action="<?php echo URL::site('dashboard/sign_in'); ?>" method="post">
    <input type="text" name="nick" /><br />
    <input type="password" name="password" /><br />
    <label><input type="checkbox" name="cookie"  />Remember me!</label>
    <input type="submit" value="OK!" /><br />
</form>
    <?php
endif;
?>