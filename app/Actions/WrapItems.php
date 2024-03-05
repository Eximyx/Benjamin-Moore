<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class WrapItems
{
    /**
     * @param  Collection<int, Model>  $items
     * @return Collection<int, mixed>
     */
    public function __invoke(Collection $items, int $maxSlides = 0, ?int $slideAmount = 5): Collection
    {
        $j = 0;
        $list = [new Collection()];
        foreach ($items as $index => $item) {
            if (($index % $slideAmount === 0) & ($index !== 0)) {
                $j++;
                if ($j > $maxSlides - 1 & $maxSlides !== 0) {
                    break;
                }
                $list[] = new Collection();
            }
            $list[$j]->push($item);
        }

        return new Collection($list);
    }
}
