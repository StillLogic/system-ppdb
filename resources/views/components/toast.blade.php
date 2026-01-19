<!-- Toast Notifications Container -->
<div id="toast-container" class="fixed top-4 right-4 z-50 space-y-4"></div>

<script>
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');
    
    // Set colors based on type
    let bgColor, borderColor, iconPath, iconColor;
    
    if (type === 'success') {
        bgColor = 'bg-green-50';
        borderColor = 'border-green-500';
        iconColor = 'text-green-500';
        iconPath = 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z';
    } else if (type === 'error') {
        bgColor = 'bg-red-50';
        borderColor = 'border-red-500';
        iconColor = 'text-red-500';
        iconPath = 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z';
    } else if (type === 'info') {
        bgColor = 'bg-purple-50';
        borderColor = 'border-purple-500';
        iconColor = 'text-purple-500';
        iconPath = 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z';
    } else {
        bgColor = 'bg-blue-50';
        borderColor = 'border-blue-500';
        iconColor = 'text-blue-500';
        iconPath = 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z';
    }
    
    toast.className = `${bgColor} border-l-4 ${borderColor} p-4 rounded-lg shadow-lg transform transition-all duration-300 ease-in-out translate-x-full opacity-0 min-w-[320px] max-w-md`;
    
    toast.innerHTML = `
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg class="h-6 w-6 ${iconColor}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${iconPath}"/>
                </svg>
            </div>
            <div class="ml-3 flex-1">
                <p class="text-sm font-semibold ${type === 'error' ? 'text-red-700' : type === 'success' ? 'text-green-700' : type === 'info' ? 'text-purple-700' : 'text-blue-700'}">
                    ${message}
                </p>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-3 flex-shrink-0 text-gray-400 hover:text-gray-600">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    `;
    
    container.appendChild(toast);
    
    // Trigger animation
    setTimeout(() => {
        toast.classList.remove('translate-x-full', 'opacity-0');
        toast.classList.add('translate-x-0', 'opacity-100');
    }, 10);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        toast.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}

// Show toasts on page load if there are session messages
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
        showToast("{{ session('success') }}", 'success');
    @endif
    
    @if(session('error'))
        showToast("{{ session('error') }}", 'error');
    @endif
    
    @if(session('new_admin'))
        showToast("✅ Akun Admin Berhasil Dibuat! | Nama: {{ session('new_admin')['name'] }} | Email: {{ session('new_admin')['email'] }}", 'info');
    @endif
    
    @if(session('credentials'))
        showToast("🔐 Akun Berhasil Dibuat! | Nama: {{ session('credentials')['nama'] }} | Email: {{ session('credentials')['email'] }} | Password: {{ session('credentials')['password'] }}", 'info');
    @endif
});
</script>
