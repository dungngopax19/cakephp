<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tag Entity
 *
 * @property int $id
 * @property string $title
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property list<\App\Model\Entity\Article> $articles
 */
class Tag extends Entity
{
    protected array $_accessible = [
        'title' => true,
        'created' => true,
        'modified' => true,
        'articles' => true,
    ];
}
