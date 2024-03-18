<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Observers\FormTypeObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([FormTypeObserver::class])]
class FormType extends Model
{
    use HasFactory;
}
