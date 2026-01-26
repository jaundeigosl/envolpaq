<?php
$prodImg = !empty($producto['image_url']) 
    ? $producto['image_url'] 
    : 'public/imagenes/placeholder.png'; 
?>

<div class="bg-card rounded-lg shadow-sm hover:shadow-md transition-all flex flex-col h-full overflow-hidden border border-gray-200">
    
    <div class="h-56 overflow-hidden relative bg-gray-100 group">
        <img 
            src="<?php echo BASE_URL . $prodImg; ?>" 
            alt="<?php echo $producto['name']; ?>" 
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
            loading="lazy"
            onerror="this.onerror=null;this.src='<?php echo BASE_URL; ?>public/imagenes/placeholder.png';"
        >
    </div>
    
    <div class="p-5 flex flex-col flex-grow">
        <h3 class="font-bold text-lg mb-2 text-center text-gray-800 leading-tight">
            <?php echo $producto['name']; ?>
        </h3>
        
        <p class="text-sm text-gray-600 text-center mb-4 flex-grow line-clamp-3">
            <?php echo $producto['description']; ?>
        </p>

        <a 
            href="https://wa.me/4448143689?text=Hola,%20me%20interesa%20cotizar:%20<?php echo urlencode($producto['name']); ?>" 
            target="_blank"
            class="mt-auto flex items-center justify-center w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition-colors gap-2"
            style="background-color: #25D366; /* Color oficial WhatsApp */ color: white;"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>
            </svg>
            Cotizar
        </a>
    </div>
</div>