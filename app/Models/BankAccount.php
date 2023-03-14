<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = ['bank_name', 'account_type', 'branch_code', 'account_number', 'swift_code', 'account_name', 'user_id'];
    protected $table = 'bank_accounts';
}
