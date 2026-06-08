<?php

namespace App\Traits;

use App\Models\AuditTrail;
use Illuminate\Support\Facades\Auth;

trait HasAuditTrail
{
    public static function bootHasAuditTrail()
    {
        static::created(function ($model) {
            $model->logAudit('created');
        });

        static::updated(function ($model) {
            $model->logAudit('updated');
        });

        static::deleted(function ($model) {
            $model->logAudit('deleted');
        });
    }

    public function logAudit($action)
    {
        $user = Auth::user();

        // fallback: if no authenticated user (e.g., CLI), try extract user id from model attributes
        $fallbackUserId = null;
        foreach (['user_id', 'id_user', 'id_kasir', 'id_pasien'] as $field) {
            if (isset($this->{$field}) && $this->{$field}) {
                $fallbackUserId = $this->{$field};
                break;
            }
        }

        // capture only changed attributes for updated, full attributes for created
        $changes = [];
        if ($action === 'updated') {
            $changes = $this->getChanges();
        } else {
            $changes = $this->attributesToArray();
        }

        AuditTrail::create([
            'auditable_type' => get_class($this),
            'auditable_id' => $this->getKey(),
            'user_id' => $user ? $user->id : $fallbackUserId,
            'action' => $action,
            'changes' => $changes ? json_encode($changes, JSON_UNESCAPED_UNICODE) : null,
            'ip_address' => request()->ip(),
        ]);
    }
}
