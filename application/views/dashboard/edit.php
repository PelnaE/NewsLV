
<?php $user_session = Session::instance()->get('user'); ?>

<?php if(empty($user_session)):?>
<h3>Session error!</h3><p>You must be signed in!</p>
<?php else: ?>
<?php if (!empty($success)): ?>
    <p>Article has been saved!</p><a href="'<?= URL::site('dashboard/posts') ?>'">Back to the list!</a>
<?php endif; ?>
    
<?php foreach ($posts as $entry): ?>
    <form action="<?= URL::site('dashboard/posts/edit/' .$entry->id) ?>" method="post">
        <input type="hidden" name="csrf_token" value="<?= Security::token() ?>" />
        <input type="text" name="title" value="<?= $entry->title ?>" /><br />
        <textarea name="introduction" id="" cols="30" rows="10"><?= $entry->introduction ?></textarea><br />
        <textarea name="content" id="" cols="30" rows="10"><?= $entry->content ?></textarea><br />
        <input type="submit" value="Edit!" />
    </form>
    
<?php endforeach; ?>
    
<?php endif; ?>