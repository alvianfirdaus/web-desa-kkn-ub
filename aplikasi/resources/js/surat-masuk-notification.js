// Fungsi utilitas
function formatTimeAgo(date) {
    // Konversi ke zona waktu Asia/Jakarta (UTC+7)
    const jakartaOffset = 7 * 60 * 60 * 1000; // 7 jam dalam milidetik
    const jakartaDate = new Date(date.getTime() + jakartaOffset);
    const now = new Date(new Date().getTime() + jakartaOffset);
    
    const seconds = Math.floor((now - jakartaDate) / 1000);
    
    const intervals = {
        tahun: 31536000,
        bulan: 2592000,
        minggu: 604800,
        hari: 86400,
        jam: 3600,
        menit: 60,
        detik: 1
    };
    
    for (const [unit, secondsInUnit] of Object.entries(intervals)) {
        const interval = Math.floor(seconds / secondsInUnit);
        if (interval >= 1) {
            return interval === 1 ? `1 ${unit} yang lalu` : `${interval} ${unit} yang lalu`;
        }
    }
    
    return 'Tidak Diketahui';
}

function playNotificationSound() {
    const audio = new Audio('/storage/sound/notif.wav');
    audio.play().catch(e => console.log('Audio play failed:', e));
}

// Fungsi utama
async function updateNotificationCounter() {
    try {
        const response = await fetch('/desa/dashboard/notifications/unread-count');
        const data = await response.json();
        
        const counter = document.getElementById('notification-counter');
        if (counter) {
            counter.textContent = data.count;
            counter.style.display = data.count > 0 ? 'inline-block' : 'none';
        }
    } catch (error) {
        console.error('Error updating counter:', error);
    }
}

function addNotificationToDropdown(data) {
    const notificationList = document.getElementById('notification-items');
    if (!notificationList) return;

    const notificationItem = document.createElement('a');
    // Perbaikan URL dengan menambahkan prefix desa/dashboard
    notificationItem.href = `/desa/dashboard/manajemen_surat/edit/${data.surat_id}`;
    notificationItem.className = 'dropdown-item notification-item';
    notificationItem.dataset.notificationId = data.id;
    
    notificationItem.innerHTML = `
        <div class="d-flex justify-content-between">
            <span>${data.message}</span>
            <small class="text-muted">${formatTimeAgo(new Date(data.created_at))}</small>
        </div>
    `;

    notificationItem.addEventListener('click', async function(e) {
        e.preventDefault();
        try {
            await fetch(`/desa/dashboard/notifications/${data.id}/mark-as-read`, { // Perbaikan URL
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            });
            window.location.href = this.href;
        } catch (error) {
            console.error('Error marking as read:', error);
            window.location.href = this.href;
        }
    });

    const divider = document.createElement('div');
    divider.className = 'dropdown-divider';
    notificationList.prepend(divider, notificationItem);
}

function handleNewNotification(data) {
    console.log('Notifikasi baru diterima:', data);
    updateNotificationCounter();
    addNotificationToDropdown(data);
    playNotificationSound();
}

async function loadInitialNotifications() {
    try {
        const response = await fetch('/desa/dashboard/notifications/latest');
        const notifications = await response.json();
        
        const notificationList = document.getElementById('notification-items');
        if (!notificationList) return;
        
        // Kosongkan daftar notifikasi
        notificationList.innerHTML = '';
        
        // Tambahkan divider pertama
        const initialDivider = document.createElement('div');
        initialDivider.className = 'dropdown-divider';
        notificationList.appendChild(initialDivider);
        
        // Tambahkan notifikasi
        notifications.forEach(data => {
            addNotificationToDropdown(data);
        });
        
        // Update counter
        await updateNotificationCounter();
    } catch (error) {
        console.error('Error loading initial notifications:', error);
    }
}

// Manajemen koneksi Pusher
function setupPusherConnection() {
    const userId = document.querySelector('meta[name="user-id"]')?.content;
    if (!userId) {
        console.error('User ID not found');
        return;
    }

    // Setup debug listeners (hanya sekali)
    window.Echo.connector.pusher.connection.bind('state_change', (states) => {
        console.log('Pusher connection state:', states.current);
    });

    window.Echo.connector.pusher.connection.bind('error', (err) => {
        console.error('Pusher connection error:', err);
    });

    // Fungsi untuk subscribe channel
    const subscribeToChannel = () => {
        window.Echo.private(`App.Models.User.${userId}`)
        .notification((notification) => {
            console.log('New notification received:', notification);
            handleNewNotification({
                id: notification.id,
                surat_id: notification.data.surat_id,
                message: notification.data.message,
                created_at: notification.created_at
            });
        })
            .error((err) => {
                console.error('Subscription error:', err);
                setTimeout(subscribeToChannel, 3000); // Reconnect after 3 seconds
            });
    };

    // Mulai koneksi pertama kali
    subscribeToChannel();
}

// Panggil saat DOM ready
document.addEventListener('DOMContentLoaded', function() {
    loadInitialNotifications();
    setupPusherConnection();
    
    // Mark all as read
    document.getElementById('mark-all-read')?.addEventListener('click', async function(e) {
        e.preventDefault();
        try {
            await fetch('/desa/dashboard/notifications/mark-all-read', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });
            await loadInitialNotifications();
        } catch (error) {
            console.error('Error marking all as read:', error);
        }
    });
});