<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Category Name => Icon Class mapping
        $categories = [
            'Accounting/Finance' => 'fas fa-calculator',
            'Production/Operation' => 'fas fa-cogs',
            'Agro (Plant/Animal/Fisheries)' => 'fas fa-seedling',
            'Bank/Non-Bank Fin. Institution' => 'fas fa-university',
            'Hospitality/ Travel/ Tourism' => 'fas fa-plane',
            'NGO/Development' => 'fas fa-hands-helping',
            'Supply Chain/Procurement' => 'fas fa-truck',
            'Commercial' => 'fas fa-store',
            'Research/Consultancy' => 'fas fa-search',
            'Education/Training' => 'fas fa-graduation-cap',
            'IT/Telecommunication' => 'fas fa-laptop-code',
            'Receptionist/ PS' => 'fas fa-user-tie',
            'Engineer/Architect' => 'fas fa-drafting-compass',
            'Marketing/Sales' => 'fas fa-chart-line',
            'Data Entry/Operator/BPO' => 'fas fa-keyboard',
            'Garments/Textile' => 'fas fa-tshirt',
            'Customer Service/Call Centre' => 'fas fa-headset',
            'Design/Creative' => 'fas fa-paint-brush',
            'HR/Org. Development' => 'fas fa-users-cog',
            'Media/Advertisement/Event Mgt.' => 'fas fa-bullhorn',
            'Security/Support Service' => 'fas fa-shield-alt',
            'General Management/Admin' => 'fas fa-briefcase',
            'Pharmaceutical' => 'fas fa-pills',
            'Law/Legal' => 'fas fa-gavel',
            'Healthcare/Medical' => 'fas fa-heartbeat',
            'Electrician/Electronics Technician' => 'fas fa-bolt',
            'Company Secretary/Regulatory affairs' => 'fas fa-file-contract',
            'Data Entry/Computer Operator' => 'fas fa-desktop',
            'Driver' => 'fas fa-car',
            'Pathologist/ Lab Assistant' => 'fas fa-flask',
            'Mechanic/Technician' => 'fas fa-wrench',
            'Chef/Cook' => 'fas fa-utensils',
            'Security Guard' => 'fas fa-user-shield',
            'Nurse' => 'fas fa-user-md',
            'Peon' => 'fas fa-hands',
            'Waiter/Waitress' => 'fas fa-concierge-bell',
            'Delivery Man' => 'fas fa-motorcycle',
            'Sales Representative (SR)' => 'fas fa-shopping-bag',
            'Showroom Assistant/Salesman' => 'fas fa-user-tag',
            'Graphic Designer' => 'fas fa-bezier-curve',
            'Caregiver/Nanny' => 'fas fa-baby',
            'Garments technician/Machine operator' => 'fas fa-industry',
            'CAD Operator' => 'fas fa-pencil-ruler',
            'Housekeeper' => 'fas fa-broom',
            'Welder' => 'fas fa-tools',
            'Plumber/Pipe fitting' => 'fas fa-water',
            'Sewing machine operator' => 'fas fa-cut',
            'Cleaner' => 'fas fa-soap',
            'Mason/ Construction worker' => 'fas fa-hard-hat',
            'Gym/ Fitness Trainer' => 'fas fa-dumbbell',
            'Beautician/ Salon worker' => 'fas fa-magic',
            'Gardener' => 'fas fa-leaf',
            'Interpreter' => 'fas fa-language',
            'Fire Safety/ Firefighter' => 'fas fa-fire-extinguisher',
            'Imam/ Khatib/ Muezzin' => 'fas fa-place-of-worship',
            'Carpenter' => 'fas fa-hammer',
            'Physiotherapist' => 'fas fa-walking',
            'Boiler Operator' => 'fas fa-hot-tub',
            'Others' => 'fas fa-th-list'
        ];

        foreach ($categories as $name => $icon) {
            DB::table('categories')->updateOrInsert(
                ['name' => $name],
                [
                    'slug' => Str::slug($name),
                    'icon' => $icon,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}