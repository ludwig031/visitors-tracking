<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DataRepository")
 */
class Data
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $ip;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $host;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $userAgent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $time;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $token;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function getHost(): ?string
    {
      return $this->host;
    }

    public function getUserAgent(): ?string
    {
      return $this->userAgent;
    }

    public function getToken(): ?string
    {
      return $this->token;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function setHost(?string $host): self
    {
      $this->host = $host;

      return $this;
    }

    public function setUserAgent(?string $userAgent): self
    {
      $this->userAgent = $userAgent;

      return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(?\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function setToken(?string $token): self
    {
      $this->token = $token;

      return $this;
    }
}
