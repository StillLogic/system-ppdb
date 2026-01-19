<div id="credentialsModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full transform transition-all">
        <div class="p-6">
            <div class="flex items-start mb-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Akun Berhasil Dibuat!</h3>
                    <p class="text-sm text-gray-600">Berikut informasi login untuk pendaftar:</p>
                </div>
            </div>
            
            <div class="bg-blue-50 rounded-lg p-4 mb-4 border border-blue-200">
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Nama Lengkap</p>
                        <p class="font-semibold text-gray-900" id="credentialNama"></p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Email</p>
                        <p class="font-semibold text-gray-900 font-mono text-sm" id="credentialEmail"></p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600 mb-1">Password</p>
                        <div class="flex items-center justify-between bg-white rounded px-3 py-2 border border-blue-300">
                            <p class="font-bold text-blue-900 font-mono text-lg" id="credentialPassword"></p>
                            <button onclick="copyPassword()" class="ml-2 text-blue-600 hover:text-blue-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-3 rounded mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700 font-semibold">
                            Penting! Berikan informasi ini kepada pendaftar. Password ini hanya ditampilkan sekali.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-gray-50 px-6 py-4 flex justify-end rounded-b-lg border-t">
            <button type="button" onclick="closeCredentialsModal()" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                Saya Sudah Mencatat
            </button>
        </div>
    </div>
</div>

<script>
let credentialsData = null;

function showCredentialsModal(data) {
    credentialsData = data;
    document.getElementById('credentialNama').textContent = data.nama;
    document.getElementById('credentialEmail').textContent = data.email;
    document.getElementById('credentialPassword').textContent = data.password;
    document.getElementById('credentialsModal').classList.remove('hidden');
}

function closeCredentialsModal() {
    document.getElementById('credentialsModal').classList.add('hidden');
}

function copyPassword() {
    const password = document.getElementById('credentialPassword').textContent;
    navigator.clipboard.writeText(password).then(function() {
        showToast('Password berhasil disalin!', 'success');
    });
}

document.addEventListener('DOMContentLoaded', function() {
    @if(session('credentials'))
        showCredentialsModal({
            nama: "{{ session('credentials')['nama'] }}",
            email: "{{ session('credentials')['email'] }}",
            password: "{{ session('credentials')['password'] }}"
        });
    @endif
});
</script>
