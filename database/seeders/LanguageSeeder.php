<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;


class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $language = new Language();
        $language->name = 'English';
        $language->lang = 'en';
        $language->slug = 'en';
        $language->default = 1;
        $language->status = 1;
        $language->save();
    }
}
