<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
     function run()
    {

        $serviceTypes = [
            [
                'name' => 'Tours',
                'image' => 'canvas/images/ServiceType/tours.jpg',
                'tagline' => 'Explore the world with our expert guides',
                'description' => 'We offer both single and multiple-entry UAE visas for tourism, business, transit, investment, mission, medical treatment, education, property ownership, retirement, freelance work, and golden visa programs.'
            ],
            [
                'name' => 'Holiday',
                'image' => 'canvas/images/ServiceType/holiday.jpg',
                'tagline' => 'Escape with us to your dream destination.',
                'description' => 'We offer an extensive range of holiday services to help you plan your perfect getaway, from booking flights and accommodation to organizing tours and excursions, ensuring you have an unforgettable holiday experience'
            ],
            [
                'name' => 'Visa',
                'image' => 'canvas/images/ServiceType/visa.jpg',
                'tagline' => 'Your visa experts for hassle-free travel',
                'description' => 'Our visa services cover a diverse range of travel needs, including providing expert guidance on visa eligibility requirements, aiding with visa applications and preparing the required documentation'
            ],
            [
                'name' => 'Travel Insurance',
                'image' => 'canvas/images/ServiceType/insurance.jpg',
                'tagline' => "Travel with confidence - we have got you covered",
                'description' => 'We offer a range of travel insurance options to ensure you have peace of mind during your trip, including coverage for medical emergencies, trip cancellations, lost or stolen luggage, and more'
            ],
        ];
        
        foreach ($serviceTypes as $serviceType) {
            $services=ServiceType::create([
                'name' => $serviceType['name'],
                'image' =>$serviceType['image'],
                'tagline' =>$serviceType['tagline'],
                'description' =>$serviceType['description'],
            ]);
            if($services && $services->name == 'Tours'){
                $serviceSubTypes = [
                    [
                        'name' => 'Adventure Tours',
                        'image' => 'canvas/images/ServiceType/ad.jpg',
                        'tagline' => "Experience the Thrill of Dubai's Adventures with Us",
                        'description' => 'Embark on an adrenaline-fueled adventure with our range of exciting tours. From desert safaris to mountain hikes, we offer thrilling experiences that will leave you with memories to last a lifetime.'
                    ],
                    [
                        'name' => 'City Tours',
                        'image' => 'canvas/images/ServiceType/city.jpg',
                        'tagline' => 'Uncover Hidden Gems in the City.',
                        'description' => "Discover the wonders of the city with our expertly guided city tours. From iconic landmarks to hidden gems, experience the best of the city's culture, history, and architecture in one unforgettable tour."
                    ],
                    [
                        'name' => 'Water Park',
                        'image' => 'canvas/images/ServiceType/water.jpg',
                        'tagline' => 'Make a Splash with Us',
                        'description' => "Escape the heat and make a splash at our water park. With a variety of thrilling rides and attractions, there's something for everyone to enjoy on a fun-filled day out."
                    ],
                 
                    [
                        'name' => 'Dhow Cruise',
                        'image' => 'canvas/images/ServiceType/dhow.jpg',
                        'tagline' => "Travel with confidence - we have got you covered",
                        'description' => "Experience Dubai's beauty on a traditional dhow boat. Enjoy delicious cuisine and entertainment as you cruise along the stunning coastline under the stars."
                    ],
                    [
                        'name' => 'Luxury Tours',
                        'image' => 'canvas/images/ServiceType/luxury.jpg',
                        'tagline' => "A World of Luxury Awaits You",
                        'description' => 'Experience ultimate luxury with our handcrafted tours. Indulge in exclusive experiences and personalized service. Join us for an unforgettable journey into luxury.'
                    ],
                    [
                        'name' => 'Family Fun',
                        'image' => 'canvas/images/ServiceType/family.jpg',
                        'tagline' => "Create Memories with Your Loved Ones",
                        'description' => "Create unforgettable family memories with our wide range of activities and attractions suitable for all ages. From water parks to dhow cruises and city tours, we've got something for everyone. Join us for a fun-filled family adventure today"
                    ],
                    [
                        'name' => 'Yacht Charter',
                        'image' => 'canvas/images/ServiceType/boat.jpg',
                        'tagline' => "Luxury Yacht Charter for Your Ultimate Escape",
                        'description' => "Experience the luxury and adventure of a yacht charter on Dubai's stunning coastline. With our expert crew and a range of amenities, you can sit back and take in the breathtaking views, or dive in and enjoy a range of activities. Come aboard and discover the ultimate escape on the waters of Dubai."
                    ],
                    [
                        'name' => 'Heritage Tours',
                        'image' => 'canvas/images/ServiceType/arabia.jpg',
                        'tagline' => "Experience the magic of cultural traditions on our heritage tours.",
                        'description' => "Our heritage tours offer an immersive experience to explore the traditional customs, art, architecture, and history of our destinations. Join us to uncover the secrets of the past and embrace the culture of our destinations with expert guides."
                    ],

                    
                ];

                foreach ($serviceSubTypes as $serviceSubType) {
                    ServiceType::create([
                        'name' => $serviceSubType['name'],
                        'image' =>$serviceSubType['image'],
                        'tagline' =>$serviceSubType['tagline'],
                        'description' =>$serviceSubType['description'],
                        'parent_id' =>$services->id,
                    ]);
                }
            }
        }
    }
}
