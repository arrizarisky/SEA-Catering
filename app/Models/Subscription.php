<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['user_id', 'subscription_plan_id', 'start_date', 'end_date', 'full_name','phone_number','meal_types','delivery_days','allergies','total_price','is_cancelled','is_paused','pause_start','pause_end',];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function subscriptionplan() {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }
    
}
