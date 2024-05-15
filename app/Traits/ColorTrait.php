<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

trait ColorTrait
{
    /**
     * Сортирует цвета на основе их оттенков.
     *
     * @param Collection $colors
     * @return array
     */
    private function sortColors(Collection $colors): array
    {
        // Преобразуем коллекцию цветов в массив
        $colors = $colors->toArray();

        // Сортируем цвета на основе их оттенков
        usort($colors, function ($a, $b) {
            // Извлекаем оттенки цветов
            $hueA = $this->extractHue($a['hex_code']);
            $hueB = $this->extractHue($b['hex_code']);

            // Возвращаем результат сравнения
            return $hueA <=> $hueB;
        });

        return $colors;
    }

    /**
     * Извлекает оттенок цвета из его HEX кода.
     *
     * @param string $hexCode
     * @return int|null
     */
    private function extractHue(string $hexCode): ?int
    {
        // Извлекаем компоненты цвета из HEX кода
        $rgb = sscanf($hexCode, "#%02x%02x%02x");
        if ($rgb === false || count($rgb) !== 3) {
            return null;
        }

        // Вычисляем оттенок цвета
        list($r, $g, $b) = $rgb;
        $max = max($r, $g, $b);
        $min = min($r, $g, $b);

        if ($max === $min) {
            return 0;
        }

        $delta = $max - $min;
        $hue = 0;

        if ($max === $r) {
            $hue = 60 * (($g - $b) / $delta);
        } elseif ($max === $g) {
            $hue = 60 * (($b - $r) / $delta) + 120;
        } else {
            $hue = 60 * (($r - $g) / $delta) + 240;
        }

        // Приводим оттенок к диапазону [0, 360]
        if ($hue < 0) {
            $hue += 360;
        }

        return (int)$hue;
    }
}
