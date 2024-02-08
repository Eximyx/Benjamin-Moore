<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Collection;

class WrapItems
{
    public function __invoke(Collection $items, int $slideAmount): array
    {
        $j = 0;
        $List = [];
        foreach ($items as $i => $iValue) {
            if ($i % $slideAmount == 0 & $i !== 0) {
                $j++;
            }
            $List[$j][] = $iValue;
        }
        return $List;
    }
}
