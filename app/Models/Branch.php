<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'branches';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'address', 'status'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return ['name' => 'string', 'address' => 'string', 'status' => 'boolean', 'created_at' => 'datetime:Y-m-d H:i:s', 'updated_at' => 'datetime:Y-m-d H:i:s'];
    }
    

}
