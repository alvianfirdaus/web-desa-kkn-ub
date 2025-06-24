<?php

namespace App\Notifications\notifikasi;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SuratNotification extends Notification
{
    use Queueable;

    protected $surat;

    public function __construct($surat)
    {
        $this->surat = $surat;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'surat_id' => $this->surat->id,
            'surat_type' => $this->surat->suratable_type,
            'message' => 'Surat baru diajukan: ' . $this->surat->jenisSurat(),
            'created_at' => now()->toDateTimeString(),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'surat_id' => $this->surat->id,
                'surat_type' => $this->surat->suratable_type,
                'message' => 'Surat baru diajukan: ' . $this->surat->jenisSurat(),
                'created_at' => now()->toDateTimeString(),
            ],
        ];
    }
}
