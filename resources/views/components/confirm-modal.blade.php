<!-- Confirmation Modal -->
<div id="confirmModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full transform transition-all">
        <div class="p-6">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-12 w-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Konfirmasi Hapus</h3>
                    <p id="confirmMessage" class="text-sm text-gray-600"></p>
                </div>
            </div>
        </div>
        
        <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3 rounded-b-lg">
            <button type="button" onclick="closeConfirmModal()" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg transition">
                Batal
            </button>
            <button type="button" id="confirmButton" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition">
                Hapus
            </button>
        </div>
    </div>
</div>

<script>
let confirmFormToSubmit = null;

function showConfirmModal(message, form) {
    const modal = document.getElementById('confirmModal');
    const messageEl = document.getElementById('confirmMessage');
    
    messageEl.textContent = message;
    confirmFormToSubmit = form;
    
    modal.classList.remove('hidden');
    
    // Add animation
    setTimeout(() => {
        modal.querySelector('.bg-white').classList.add('scale-100');
    }, 10);
}

function closeConfirmModal() {
    const modal = document.getElementById('confirmModal');
    modal.classList.add('hidden');
    confirmFormToSubmit = null;
}

// Confirm button handler
document.addEventListener('DOMContentLoaded', function() {
    const confirmBtn = document.getElementById('confirmButton');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            if (confirmFormToSubmit) {
                confirmFormToSubmit.submit();
            }
            closeConfirmModal();
        });
    }
    
    // Close modal when clicking outside
    document.getElementById('confirmModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeConfirmModal();
        }
    });
    
    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeConfirmModal();
        }
    });
});
</script>
