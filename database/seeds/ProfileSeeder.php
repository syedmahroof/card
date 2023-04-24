<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
     function run()
    {

        $profileData = [
            'meta_title' => 'golden palace tours and travels',
            'key_words' => 'golden palace tours and travels',
            'meta_description' => 'golden palace tours and travels',
            'instagram' => 'https://www.instagram.com/goldenpalacetravels/',
            'facebook' => 'https://www.facebook.com/GoldenPalaceTravelandTourismUAE',
            'linkedin' => '',
            'twitter' => '',
            'tiktok' => '',
            'youtube' => '',
            'additional_seo_code' => 'golden palace travels  ',
            'additional_css_code' => '',
            'additional_js_code' => '',
            'banner_text' => '',
            'banner_image_1' => '',
            'banner_image_2' => '',
            'banner_image_3' => '',
            'banner_image_4' => '',
            'phone' => '0505757449',
            'mail' => 'mrfly@gpalacegroup.com',
            'address' => '',
        ];

        Profile::firstOrCreate()->update($profileData);
       
    }
}
