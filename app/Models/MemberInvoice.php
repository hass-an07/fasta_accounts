<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'member',
        'amount',
        'description',
    ];

    // Relation to CRO
    public function cro()
    {
        return $this->belongsTo(Cro::class, 'cro_id');
    }

    // Relation to Member
    public function member()
    {
        return $this->belongsTo(Cro::class, 'member_id');  // Assuming 'member' is stored in 'cros'
    }

    // Relation to Trainer
    public function trainer()
    {
        return $this->belongsTo(Cro::class, 'trainer_id'); // Assuming 'trainer' is stored in 'cros'
    }
}
