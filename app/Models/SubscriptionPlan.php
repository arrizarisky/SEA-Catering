<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $fillable = ['id','name', 'description', 'price', 'benefits', 'image'];
    public function subscription() {
        return $this->hasMany(Subscription::class);
    }

    public function testimonials() {
    return $this->hasMany(Testimoni::class);
    }
}
