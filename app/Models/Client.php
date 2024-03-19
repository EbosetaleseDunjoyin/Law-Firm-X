<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;
    

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'primary_legal_counsel',
        'date_of_birth',
        'date_of_profiling',
        'profile_image',
        'case_details',
    ];
}
