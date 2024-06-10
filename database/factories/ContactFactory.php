<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    public function definition(): array
    {
        return [
            'name' => 'Иванов Иван Иванович',
            'post' => 'Заведующий НТБ',
            'email' => 'ntbuvauga@uvauga.ru',
            'phone' => '(8422) 39-82-68',
        ];
    }
}
