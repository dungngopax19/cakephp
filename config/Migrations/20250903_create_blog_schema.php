<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateBlogSchema extends AbstractMigration
{
    public function change(): void
    {
        // users
        $this->table('users')
            ->addColumn('email', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('created', 'datetime', ['null' => true])
            ->addColumn('modified', 'datetime', ['null' => true])
            ->addIndex(['email'], ['unique' => true, 'name' => 'users_email_unique'])
            ->create();

        // articles
        $this->table('articles', ['id' => 'id'])
            ->addColumn('user_id', 'integer', ['null' => false])
            ->addColumn('title', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('slug', 'string', ['limit' => 191, 'null' => false])
            ->addColumn('body', 'text', ['null' => true])
            ->addColumn('published', 'boolean', ['default' => false, 'null' => false])
            ->addColumn('created', 'datetime', ['null' => true])
            ->addColumn('modified', 'datetime', ['null' => true])
            ->addIndex(['slug'], ['unique' => true, 'name' => 'articles_slug_unique'])
            ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION', 'constraint' => 'user_key'])
            ->create();

        // tags
        $this->table('tags')
            ->addColumn('title', 'string', ['limit' => 191, 'null' => true])
            ->addColumn('created', 'datetime', ['null' => true])
            ->addColumn('modified', 'datetime', ['null' => true])
            ->addIndex(['title'], ['unique' => true, 'name' => 'tags_title_unique'])
            ->create();

        // articles_tags
        $this->table('articles_tags', ['id' => false, 'primary_key' => ['article_id', 'tag_id']])
            ->addColumn('article_id', 'integer', ['null' => false])
            ->addColumn('tag_id', 'integer', ['null' => false])
            ->addForeignKey('tag_id', 'tags', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION', 'constraint' => 'tag_key'])
            ->addForeignKey('article_id', 'articles', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION', 'constraint' => 'article_key'])
            ->create();
    }
}
