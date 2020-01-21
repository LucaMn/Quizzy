<?php

class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $role = ['ROLE_USER'];
    private $score;
    private $completed;

    public function __construct(
        string $username,
        string $email,
        string $password,
        int $id,
        int $score,
        int $completed
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->id = $id;
        $this->score = $score;
        $this->completed = $completed;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): array
    {
        return $this->role;
    }
    public function getScore(): int
    {
        return $this->score;
    }
    public function getCompleted(): int
    {
        return $this->completed;
    }

    public function setScore(int $score)
    {
        $this->score = $score;
    }
    public function setCompleted(int $completed)
    {
        $this->completed = $completed;
    }

}