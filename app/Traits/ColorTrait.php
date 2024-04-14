<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

trait ColorTrait
{
    /**
     * @param Collection $colors
     * @return array
     */
    private function sortColors(Collection $colors): array
    {
        $colors = $colors->toArray();
        usort($colors, function ($a, $b) {
            $rgb1 = sscanf($a["hex_code"], "#%02x%02x%02x");
            $rgb2 = sscanf($b["hex_code"], "#%02x%02x%02x");

            if ($rgb1 == null)
                return 0;
            if ($rgb2 == null)
                return 0;

            list($r1, $g1, $b1) = $rgb1;
            list($r2, $g2, $b2) = $rgb2;

            return $this->step($r1, $g1, $b1, 8) <=> $this->step($r2, $g2, $b2, 8);
        });
        return $colors;
    }


    /**
     * @param int|null $r
     * @param int|null $g
     * @param int|null $b
     * @param int $repetitions
     * @return array<float|int>
     */
    private function step(?int $r, ?int $g, ?int $b, int $repetitions = 1): array
    {
        $lum = sqrt(0.241 * $r + 0.691 * $g + 0.068 * $b);
        list($h, $s, $v) = $this->rgbToHsv($r, $g, $b);
        $h2 = (int)($h * $repetitions);

        $v2 = (int)($v * $repetitions);

        if ($h2 % 2 == 1) {
            $v2 = $repetitions - $v2;
            $lum = $repetitions - $lum;
        }

        return [$h2, $lum, $v2];
    }

    /**
     * @param int|null $r
     * @param int|null $g
     * @param int|null $b
     * @return float[]|int[]
     */
    private function rgbToHsv(?int $r, ?int $g, ?int $b): array
    {
        $r /= 255;
        $g /= 255;
        $b /= 255;

        $max = max($r, $g, $b);
        $min = min($r, $g, $b);
        $delta = $max - $min;

        $v = $max;

        if ($max != 0) {
            $s = $delta / $max;
        } else {
            $s = 0;
            $h = -1;
            return [$h, $s, $v];
        }

        if ($r == $max) {
            $h = ($g - $b) / $delta;
        } else if ($g == $max) {
            $h = 2 + ($b - $r) / $delta;
        } else {
            $h = 4 + ($r - $g) / $delta;
        }

        $h *= 60;
        if ($h < 0) {
            $h += 360;
        }

        return [$h, $s, $v];
    }
}
