<?php


class User
{
    private string $username;
    private string $email;
    private ?string $sex;
    private ?int $age;
    private bool $isActive = true;
    private DateTime $dateCreated;

    public function __construct(string $username, string $email, ?int $age = null)
    {
        $this->username = $username;
        $this->email = $email;
        $this->age = $this->setValidAge($age);
        $this->dateCreated = new DateTime();
    }

    private function setValidAge(?int $age): ?int
    {
        if ($age > 0 && $age <= 125) {
            return $age;
        }
        return null;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getSex(): ?string
    {
        return $this->sex;
    }

    /**
     * @return int|null
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @return DateTime
     */
    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }



}

