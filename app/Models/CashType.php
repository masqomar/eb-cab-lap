<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashType extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cash_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'status', 'income', 'cashout', 'transfer'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return ['name' => 'string', 'status' => 'boolean', 'income' => 'string', 'cashout' => 'string', 'transfer' => 'string', 'created_at' => 'datetime:Y-m-d H:i:s', 'updated_at' => 'datetime:Y-m-d H:i:s'];
    }
    

}
