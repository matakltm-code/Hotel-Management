<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function audit_type_text($audit_type)
    {
        $result = '';
        if ($audit_type == 'expense') {
            $result = 'Expense';
        }
        if ($audit_type == 'revenue') {
            $result = 'Revenue';
        }
        return $result;
    }
}
