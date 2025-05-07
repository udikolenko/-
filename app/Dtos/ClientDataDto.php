<?php

namespace App\Dtos;

class ClientDataDto implements \JsonSerializable
{
    private string $clientIp;
    private string $userAgent;

    public function __construct(string $clientIp, string $userAgent)
    {
        $this->clientIp = $clientIp;
        $this->userAgent = $userAgent;
    }

    public function jsonSerialize(): array
    {
        return [
            'client_ip' => $this->clientIp,
            'user_agent' => $this->userAgent
        ];
    }
}
