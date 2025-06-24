<?php

namespace App\Events\notifikasi;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewSuratNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $surat;
    public $userId;

    public function __construct($surat, $userId)
    {
        $this->surat = $surat;
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('surat-channel.' . $this->userId); // ✅ private match dengan Echo
    }

    public function broadcastAs()
    {
        return 'new-surat';
    }

    public function broadcastWith()
    {
        return [
            'surat_id' => $this->surat->id,
            'message' => 'Surat baru diajukan: ' . $this->surat->jenisSurat(),
            'notification_id' => $this->surat->id,
            'created_at' => now()->toDateTimeString(),
            'id' => uniqid() // Tambahkan ID unik untuk notifikasi
        ];
    }
}
