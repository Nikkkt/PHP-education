<?php

namespace Insid\Acdemo\Persistence\Entities;

use Insid\Acdemo\Persistence\Utils\GenericEntity;
use PDO;

class Article extends GenericEntity
{
    private string $title;
    private string $content;
    private ?string $image = null;
    private string $created_at = '';
    private ?string $updated_at = null;
    private int $user_id;

    protected static function getTableName(): string
    {
        return 'articles';
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getAuthor(): ?User
    {
        return User::findById($this->user_id);
    }

    public function getComments(): array
    {
        $pdo = self::getPdo();
        $stmt = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id ORDER BY id DESC");
        $stmt->execute([':article_id' => $this->id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Comment::class);
    }

    public function getTags(): array
    {
        $pdo = self::getPdo();
        $stmt = $pdo->prepare("
            SELECT t.* FROM tags t
            INNER JOIN article_tag at ON at.tag_id = t.id
            WHERE at.article_id = :article_id
        ");
        $stmt->execute([':article_id' => $this->id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Tag::class);
    }

    public function addTag(Tag $tag): bool
    {
        $pdo = self::getPdo();
        $stmt = $pdo->prepare("INSERT IGNORE INTO article_tag (article_id, tag_id) VALUES (:article_id, :tag_id)");
        return $stmt->execute([':article_id' => $this->id, ':tag_id' => $tag->getId()]);
    }

    public function getTitle(): string { return $this->title; }
    public function setTitle(string $title): void { $this->title = $title; }
    public function getContent(): string { return $this->content; }
    public function setContent(string $content): void { $this->content = $content; }
    public function getImage(): ?string { return $this->image; }
    public function setImage(string $image): void { $this->image = $image; }
    public function getCreatedAt(): string { return $this->created_at; }
    public function setCreatedAt(string $created_at): void { $this->created_at = $created_at; }
    public function getUpdatedAt(): ?string { return $this->updated_at; }
    public function setUpdatedAt(string $updated_at): void { $this->updated_at = $updated_at; }
    public function getUser(): ?User { return User::findById($this->user_id); }
    public function setUser(User $user): void { $this->user_id = $user->getId(); }
}
