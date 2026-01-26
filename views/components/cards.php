<?php

$imagenMostrar = !empty($category['image_url']) ? $category['image_url'] : 'public/imagenes/envolpaq_logo.png';

?>

<a href="<?php echo BASE_URL; ?>controllers/controller_product.php?id=<?php echo $category['id']; ?>" class="block h-full">

    <div class="rounded-lg border bg-card text-card-foreground shadow-sm flex flex-col transition-all duration-300 hover:scale-105 hover:shadow-xl overflow-hidden cursor-pointer h-full">
        
        <div class="catalog-img-container bg-white">
            <img 
                src="<?php echo BASE_URL . $imagenMostrar; ?>" 
                alt="<?php echo $category['name']; ?>" 
                class="object-cover w-full h-full"
                loading="lazy"
                
                onerror="this.onerror=null;this.src='<?php echo BASE_URL; ?>public/imagenes/placeholder.png';"
            >
        </div>
        
        <div class="p-6 text-center">
            <h4 class="font-headline font-bold text-xl mb-2">
                <?php echo $category['name']; ?>
            </h4>
            <p class="text-sm text-white/90 text-center">
                <?php echo $category['description']; ?>
            </p>
        </div>
    </div>

</a>