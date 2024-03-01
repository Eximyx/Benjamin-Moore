<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Settings>
 */
class SettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => 'sales@benjaminmoore.by',
            'phone' => '+375 (29) 608-40-00',
            'work_time' => 'Работаем ПН — ПТ, 10:00 — 19:00',
            'location' => 'Республика Беларусь, г. Минск,ул. Восточная, д. 41',
            'instagram' => '@benjaminmoore.by',
            'description' => 'Задача организации, в особенности же граница обучения кадров играет определяющее значение для существующих финансовых и административных условий. Внезапно, предприниматели в сети интернет функционально разнесены на независимые элементы.\nВот вам яркий пример современных тенденций — социально-экономическое развитие обеспечивает актуальность направлений прогрессивного развития. Внезапно, предприниматели в сети интернет функционально разнесены на независимые элементы.'
        ];
    }
}
