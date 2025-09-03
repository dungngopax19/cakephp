<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArticlesTags Model - join table
 */
class ArticlesTagsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('articles_tags');
        $this->setPrimaryKey(['article_id', 'tag_id']);

        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('article_id')
            ->requirePresence('article_id', 'create')
            ->notEmptyString('article_id');
        $validator
            ->integer('tag_id')
            ->requirePresence('tag_id', 'create')
            ->notEmptyString('tag_id');

        return $validator;
    }
}
