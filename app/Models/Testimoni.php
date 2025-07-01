<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = ['user_id','subscription_plan_id', 'name', 'message', 'rating'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subscriptionPlan() {
    return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
}
}
