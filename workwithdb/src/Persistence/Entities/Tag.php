<?php

namespace Insid\Acdemo\Persistence\Entities;

use Insid\Acdemo\Persistence\Utils\GenericEntity;
use PDO;

class Tag extends GenericEntity
{
    private string $name;

    protected static function getTableName(): string
    {
        return 'tags';
    }

    public function getArticles(): array
    {
        $pdo = self::getPdo();
        $stmt = $pdo->prepare("
            SELECT a.* FROM articles a
            INNER JOIN article_tag at ON at.article_id = a.id
            WHERE at.tag_id = :tag_id
        ");
        $stmt->execute([':tag_id' => $this->id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Article::class);
    }

    public function getName(): string { return $this->name; }
    public function setName(string $name): void { $this->name = $name; }
}
