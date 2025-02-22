<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['code', 'branch_id', 'date', 'amount', 'description', 'transaction_type', 'from_cash_type_id', 'to_cash_type_id', 'account_type_id', 'dk'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return ['code' => 'string', 'date' => 'date:Y-m-d', 'amount' => 'integer', 'description' => 'string', 'transaction_type' => 'string', 'created_at' => 'datetime:Y-m-d H:i:s', 'updated_at' => 'datetime:Y-m-d H:i:s'];
    }
    
	
	public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\Branch::class);
	}
	
	public function from_cash_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\CashType::class);
	}
	
	public function to_cash_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\CashType::class);
	}
	
	public function account_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\AccountType::class);
	}

}
