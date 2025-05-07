<?php

namespace App\Dtos;

class ServerDataDto implements \JsonSerializable
{
    private string $phpVersion;
    private string $serverSoftware;

    public function __construct(string $phpVersion, string $serverSoftware)
    {
        $this->phpVersion = $phpVersion;
        $this->serverSoftware = $serverSoftware;
    }

    public function jsonSerialize(): array
    {
        return [
            'php_version' => $this->phpVersion,
            'server_software' => $this->serverSoftware
        ];
    }
}
