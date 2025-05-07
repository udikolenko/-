<?php

namespace App\Dtos;

class DatabaseDataDto implements \JsonSerializable
{
    private string $databaseName;
    private bool $connectionStatus;

    public function __construct(string $databaseName, bool $connectionStatus)
    {
        $this->databaseName = $databaseName;
        $this->connectionStatus = $connectionStatus;
    }

    public function jsonSerialize(): array
    {
        return [
            'database_name' => $this->databaseName,
            'connection_status' => $this->connectionStatus
        ];
    }
}
