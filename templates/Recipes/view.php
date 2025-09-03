<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>

<?= $this->element('helpbox', ['helptext' => 'Need help? ---' . $article->id]) ?>