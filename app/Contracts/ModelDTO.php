<?php

namespace App\Contracts;

interface ModelDTO
{
    /**
     * @return array<int, mixed>
     */
    public function toArray(): array;
}
