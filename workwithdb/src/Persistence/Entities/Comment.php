<?php

namespace Insid\Acdemo\Persistence\Entities;

use Insid\Acdemo\Persistence\Utils\GenericEntity;

class Comment extends GenericEntity
{
    private int $article_id;
    private int $user_id;
    private string $content;
    private string $created_at = '';
    private ?string $updated_at = null;

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public function getUser(): ?User { return User::findById($this->user_id); }
    public function setUser(?User $user): void { $this->user_id = $user->getId(); }
    public function getArticle(): ?Article { return Article::findById($this->article_id); }
    public function setArticle(?Article $article): void { $this->article_id = $article->id; }
    public function getCreatedAt(): ?string { return $this->created_at; }
    public function setCreatedAt(?string $created_at): void { $this->created_at = $created_at; }
    public function getUpdatedAt(): ?string { return $this->updated_at; }
    public function setUpdatedAt(?string $updated_at): void { $this->updated_at = $updated_at; }
    public function getContent(): ?string { return $this->content; }
    public function setContent(?string $content): void { $this->content = $content; }
}
