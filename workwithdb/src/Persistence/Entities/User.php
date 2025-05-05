<?php

namespace Insid\Acdemo\Persistence\Entities;

use Insid\Acdemo\Persistence\Utils\GenericEntity;

class User extends GenericEntity
{
    private string $username;
    private string $email;
    private string $password;
    private string $created_at = '';
    private ?string $updated_at = null;

    protected static function getTableName(): string
    {
        return 'users';
    }

    public function getUsername(): string { return $this->username; }
    public function setUsername(string $username): void { $this->username = $username; }
    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function getPassword(): string { return $this->password; }
    public function setPassword(string $password): void { $this->password = $password; }
    public function getCreatedAt(): string { return $this->created_at; }
    public function setCreatedAt(string $created_at): void { $this->created_at = $created_at; }
    public function getUpdatedAt(): ?string { return $this->updated_at; }
    public function setUpdatedAt(?string $updated_at): void { $this->updated_at = $updated_at; }
}
