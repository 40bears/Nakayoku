<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FelisBankAccount extends Model
{
    use HasFactory;

    protected $fillable = ['bank_name', 'swift_code', 'branch_name', 'account_type', 'branch_code', 'account_number', 'account_name', 'created_at', 'updated_at'];
    protected $table = 'felis_bank_accounts';
}
