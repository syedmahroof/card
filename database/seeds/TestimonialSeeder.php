<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
     function run()
    {

        $testimonials = [
           
            [
                'name' => 'Syed',
                'image' => 'canvas/images/ServiceType/holiday.jpg',
                'position' => 'Manager',
                'body' => "Thanks to your travel company, I had the trip of a lifetime in Thailand. The itinerary was perfect, the accommodations were top-notch, and the tour guides were knowledgeable and friendly. I especially loved visiting the temples in Bangkok and relaxing on the beautiful beaches. Can't wait to plan my next trip with your team. Highly recommended!"
            ],
            [
                'name' => 'Visa',
                'image' => 'canvas/images/ServiceType/visa.jpg',
                'position' => 'Software Engineer',
                'body' => 'I had an amazing Maldives vacation thanks to [travel company name]. They provided top-notch accommodations and unforgettable activities. Highly recommend!'
            ],
            [
                'name' => 'Travel Insurance',
                'image' => 'canvas/images/ServiceType/insurance.jpg',
                'position' => "Web Developer",
                'body' => 'I had an amazing experience booking my Dubai trip with golden palace. The team was incredibly helpful and attentive, and everything was well-coordinated. Thanks for an unforgettable trip!'
            ],
        ];
        
        foreach ($testimonials as $testimonial) {
            Testimonial::create([
                'name' => $testimonial['name'],
                'image' =>$testimonial['image'],
                'position' =>$testimonial['position'],
                'body' =>$testimonial['body'],
            ]);
           
        }
    }
}
