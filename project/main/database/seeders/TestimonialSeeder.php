<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Ports the 3 hardcoded testimonials in resources/views/index.blade.php
     * into the testimonials table for zero visual regression.
     */
    public function run()
    {
        $now = now();

        $testimonials = [
            [
                'name' => 'Rajesh K.',
                'location' => 'Coconut Farmer',
                'photo' => 'images/testimonial/1.webp',
                'review' => 'Outstanding quality of Dwarf Orange seedlings. Out of 200 plants, all are growing healthy and strong. Excellent guidance provided by the nursery team!',
                'rating' => 5,
                'sort_order' => 1,
            ],
            [
                'name' => 'Senthil M.',
                'location' => 'Estate Manager',
                'photo' => 'images/testimonial/2.webp',
                'review' => 'Best hybrid coconut nursery in Tamil Nadu. The delivery was right on time within 3 days. Very professional booking process via WhatsApp.',
                'rating' => 5,
                'sort_order' => 2,
            ],
            [
                'name' => 'Anandhan G.',
                'location' => 'Agriculturalist',
                'photo' => 'images/testimonial/3.webp',
                'review' => 'Their planting instructions and maintenance tips helped our farm layout planning immensely. The seedlings are high quality and pest resistant.',
                'rating' => 5,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $t) {
            DB::table('testimonials')->insert(array_merge($t, [
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
