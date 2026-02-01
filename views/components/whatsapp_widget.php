<!-- Whatsapp Sticky Widget -->
<div id="whatsapp-widget">
    <!-- Button (Fixed Bottom Right) -->
    <button onclick="toggleWhatsappModal()"
        class="fixed bottom-6 right-6 z-50 bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-all transform hover:scale-110 flex items-center justify-center"
        style="border: none; border-radius: 100%; position: fixed; bottom: 24px; right: 24px; z-index: 9999; width: 60px; height: 60px; background-color: #25D366; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
        <!-- Whatsapp Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="white" stroke="white"
            stroke-width="0" stroke-linecap="round" stroke-linejoin="round">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
        </svg>
    </button>

    <!-- Modal Overlay (Centered) -->
    <div id="whatsapp-modal"
        class="hidden fixed inset-0 bg-black/50 z-[10000] flex items-center justify-center p-4 backdrop-blur-sm"
        style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(0,0,0,0.5); z-index: 10000; display: none; align-items: center; justify-content: center;">

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-sm overflow-hidden transform transition-all animate-in fade-in zoom-in-95 duration-200"
            onclick="event.stopPropagation()"
            style="background-color: white; border-radius: 0.5rem; max-width: 24rem; width: 100%; overflow: hidden;">
            <div class="bg-[#075E54] p-4 flex justify-between items-center text-white"
                style="background-color: #075E54; padding: 1rem; display: flex; justify-content: space-between; align-items: center; color: white;">
                <span class="font-bold text-lg" style="font-weight: bold; font-size: 1.125rem;">Contáctanos por
                    WhatsApp</span>
                <button onclick="toggleWhatsappModal()"
                    class="text-white hover:bg-white/20 rounded-full p-1 transition-colors"
                    style="color: white; background: transparent; border: none; cursor: pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-6 flex flex-col gap-4 bg-gray-50"
                style="padding: 1.5rem; display: flex; flex-direction: column; gap: 1rem; background-color: #f9fafb;">
                <p class="text-gray-600 text-center text-sm mb-2 font-medium"
                    style="color: #4b5563; text-align: center; font-size: 0.875rem; margin-bottom: 0.5rem; font-weight: 500;">
                    Selecciona un número para iniciar el chat:
                </p>

                <a href="https://wa.me/1234567890" target="_blank"
                    class="flex items-center gap-4 p-4 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-green-500 hover:bg-green-50 transition-all group"
                    style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background-color: white; border: 1px solid #e5e7eb; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                    <div class="bg-green-100 p-2 rounded-full group-hover:bg-green-200 transition-colors"
                        style="background-color: #dcfce7; padding: 0.5rem; border-radius: 9999px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="#25D366" stroke="none">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block font-bold text-gray-800"
                            style="display: block; font-weight: bold; color: #1f2937;">Ventas y Atención</span>
                        <span class="text-sm text-gray-500" style="font-size: 0.875rem; color: #6b7280;">Whatsapp
                            1</span>
                    </div>
                </a>

                <a href="https://wa.me/0987654321" target="_blank"
                    class="flex items-center gap-4 p-4 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-green-500 hover:bg-green-50 transition-all group"
                    style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background-color: white; border: 1px solid #e5e7eb; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                    <div class="bg-green-100 p-2 rounded-full group-hover:bg-green-200 transition-colors"
                        style="background-color: #dcfce7; padding: 0.5rem; border-radius: 9999px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="#25D366" stroke="none">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block font-bold text-gray-800"
                            style="display: block; font-weight: bold; color: #1f2937;">Soporte Técnico</span>
                        <span class="text-sm text-gray-500" style="font-size: 0.875rem; color: #6b7280;">Whatsapp
                            2</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleWhatsappModal() {
        const modal = document.getElementById('whatsapp-modal');
        if (modal.style.display === 'flex') {
            modal.style.display = 'none';
        } else {
            modal.style.display = 'flex';
        }
    }

    // Close modal when clicking on the overlay
    document.getElementById('whatsapp-modal').addEventListener('click', function (e) {
        if (e.target === this) {
            this.style.display = 'none';
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.getElementById('whatsapp-modal').style.display = 'none';
        }
    });
</script>