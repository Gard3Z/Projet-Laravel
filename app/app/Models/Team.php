<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function passwords()
    {
        return $this->hasMany(Password::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
?>