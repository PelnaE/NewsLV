<h2>Jaunumi:</h2>
<?php
foreach ($news as $post): ?>
<article>
	<section class="title"><h3><a href="<?=URL::site('post/'.$post['id'].'/'.$post['slug'])?>"><?=$post['title']?></a></h3></section>
	<section class="date_and_author"><?=__('created')?> <?=date('d.m.Y - H:i:s', $post['date'])?> <?=__('author')?><?=$post['author']?></section>
	<section class="introduction"><?=$post['introduction']?></section>
</article>
<?php endforeach; ?>
<h2>Raksti:</h2>
<?php
foreach ($articles as $post): ?>
<article>
	<section class="title"><h3><?=$post['title']?></h3></section>
	<section class="date_and_author"><?=__('created')?> <?=date('d.m.Y - H:i:s', $post['date'])?> <?=__('author')?><?=$post['author']?></section>
	<section class="introduction"><?=$post['introduction']?></section>
</article>
<?php endforeach; ?>
