<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class WrapItems
{
    /**
     * @param Collection<int,Model> $items
     * @param int $slideAmount
     * @return array<int,array<Model>>
     */
    public function __invoke(Collection $items, int $slideAmount): array
    {
        $j = 0;
        $List = [];
        foreach ($items as $i => $iValue) {
            if (($i % $slideAmount === 0) & ($i !== 0)) {
                $j++;
            }
            $List[$j][] = $iValue;
        }
        return $List;
    }
}
