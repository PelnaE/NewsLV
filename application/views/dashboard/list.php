
<?php $user_session = Session::instance()->get('user'); ?>

<?php if (empty($user_session)): ?>
    <h3>Session Error!</h3>
    <p>Please check if you are logged in!</p>
<?php else: ?>

    <?php if (!empty($posts)): ?>

        <table>

            <tr>

                <th>ID</th>

                <th><?= __('title') ?></th>

                <th><?= __('created') ?></th>

                <th>Options</th>

            </tr>

            <?php foreach ($posts as $entry): ?>

                <tr>

                    <td><?php echo $entry['id']; ?></td>

                    <td><a href="<?= URL::site('dashboard/posts/edit/' .$entry['id']) ?>"><?= $entry['title'] ?></a></td>

                    <td><?= date('j.m.Y H:i:s', $entry['date']) ?></td>

                    <td><a href="<?= URL::site('dashboard/posts/delete/' . $entry['id'].'/'.Security::token()) ?>" class="delete_entry">[x]</a></td>

                </tr>

            <?php endforeach; ?>

        </table>

    <?php else: ?>

        <h3>No articles found!</h3><p>There are no articles found!</p>

    <?php endif; ?>
<?php endif; ?>