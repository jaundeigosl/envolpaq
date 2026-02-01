<?php
// views/components/subcategory_card.php

$imagenMostrar = !empty($subcategory['image_url']) ? $subcategory['image_url'] : 'public/imagenes/envolpaq_logo.png';
?>

<a href="<?php echo BASE_URL; ?>controllers/controller_product.php?id=<?php echo $subcategory['category_id']; ?>&sub_id=<?php echo $subcategory['id']; ?>"
    class="block h-full">

    <div
        class="rounded-lg border bg-card text-card-foreground shadow-sm flex flex-col transition-all duration-300 hover:scale-105 hover:shadow-xl overflow-hidden cursor-pointer h-full">

        <div class="catalog-img-container bg-white w-full h-72">
            <img src="<?php echo BASE_URL . $imagenMostrar; ?>" alt="<?php echo $subcategory['name']; ?>"
                class="object-contain w-full h-full" loading="lazy"
                onerror="this.onerror=null;this.src='<?php echo BASE_URL; ?>public/imagenes/placeholder.png';">
        </div>

        <div class="p-6 text-center">
            <h4 class="font-headline font-bold text-xl mb-2">
                <?php echo $subcategory['name']; ?>
            </h4>
            <p class="text-sm text-muted-foreground text-center line-clamp-2">
                <?php echo $subcategory['description']; ?>
            </p>
        </div>
    </div>

</a>