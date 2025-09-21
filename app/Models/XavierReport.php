<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class XavierReport extends Model
{
    protected $primaryKey = 'xavier_id';

    protected $fillable = [
        'user_id',
        'report_name',
        'whatsapp_sent_count',
        'email_sent_count',
        'status',
        'remarks',
    ];

    // State machine transitions
    protected array $transitions = [
        'pending'    => ['processing', 'failed'],
        'processing' => ['completed', 'failed'],
        'failed'     => ['pending'], // allow retry
        'completed'  => [],
    ];

    public function canTransitionTo(string $next): bool
    {
        return in_array($next, $this->transitions[$this->status] ?? []);
    }

    public function transitionTo(string $next, string $remarks = null): bool
    {
        if ($this->canTransitionTo($next)) {
            $this->status = $next;
            if ($remarks) {
                $this->remarks = $remarks;
            }
            $this->save();

            Log::info("Report {$this->xavier_id} transitioned to {$next}");
            return true;
        }

        Log::warning("Invalid transition from {$this->status} to {$next}");
        return false;
    }
}
