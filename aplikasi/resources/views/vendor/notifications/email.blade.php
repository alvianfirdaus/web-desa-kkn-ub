<x-mail::message>    
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# Oops! Ada Masalah.
@else
# Halo!
@endif
@endif

{{-- Intro Lines --}}
Email ini dikirim karena ada permintaan untuk **reset password** akun Anda.<br>
Jika Anda tidak meminta reset password, harap abaikan email ini atau segera hubungi **admin perusahaan**.<br>

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Salutation --}}
Terima kasih telah menggunakan layanan **ERC Digital Desa**.<br>
Salam,<br>
**Tim ERC Digital Desa**

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
**Eksa Reka Cipta**
</x-slot:subcopy>
@endisset
</x-mail::message>
