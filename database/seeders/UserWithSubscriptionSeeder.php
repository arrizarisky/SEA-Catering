<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserWithSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 3 paket langganan jika belum ada
        $plans = [
             ['name' => 'Diet Plan', 'price' => 30000, 'description' => 'Paket diet sehat'],
            ['name' => 'Protein Plan', 'price' => 40000, 'description' => 'Paket tinggi protein'],
            ['name' => 'Royal Plan', 'price' => 60000, 'description' => 'Paket premium royal'],
        ];
        

        foreach ($plans as $planData) {
            SubscriptionPlan::firstOrCreate(
                ['name' => $planData['name']],
                [ 
                    'price' => $planData['price'],
                    'description' => $planData['description'],
                ],
            );
        }

        // Buat 5 user pelanggan
        foreach (range(1, 5) as $i) {
            $user = User::create([
                'name' => "Pelanggan {$i}",
                'email' => "pelanggan{$i}@example.com",
                'password' => Hash::make('password'),
                'role' => 'pelanggan',
                'is_active' => true,
            ]);

            $plan = SubscriptionPlan::inRandomOrder()->first();

            Subscription::create([
                'user_id' => $user->id,
                'subscription_plan_id' => $plan->id,
                'full_name' => $user->name,
                'phone_number' => '08123456789' . $i,
                'meal_types' => json_encode(['Sarapan', 'Makan Siang']),
                'delivery_days' => json_encode(['Senin', 'Selasa', 'Rabu']),
                'allergies' => 'Udang',
                'total_price' => $plan->price * 2 * 3 * 4.3,
                'address' => 'Jalan Contoh No. ' . $i,
                'notes' => 'Tanpa pedas',
                'payment_method' => 'transfer',
                'start_date' => now(),
                'end_date' => now()->addMonth(),
            ]);
        }
    }
}
