<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'account_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['code', 'name', 'type', 'income_statement', 'income', 'cashout', 'status'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return ['code' => 'string', 'name' => 'string', 'type' => 'string', 'income_statement' => 'string', 'income' => 'string', 'cashout' => 'string', 'status' => 'boolean', 'created_at' => 'datetime:Y-m-d H:i:s', 'updated_at' => 'datetime:Y-m-d H:i:s'];
    }
    

}
