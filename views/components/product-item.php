<?php
// product-item.php - Row Style for Unified List
?>

<details class="group bg-white transition-colors hover:bg-gray-50/80">
    <summary class="flex items-center justify-between p-5 cursor-pointer select-none">
        <h3 class="font-bold text-lg text-primary flex-1 pr-4 uppercase tracking-wide">
            <?php echo $producto['name']; ?>
        </h3>
        <div class="transform transition-transform duration-300 group-open:rotate-180 text-muted-foreground/70">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
    </summary>

    <div class="px-5 pb-5 pt-0">
        <div class="h-px w-full bg-border/40 mb-3"></div>
        <p class="text-sm text-muted-foreground leading-relaxed">
            <?php echo $producto['description']; ?>
        </p>
    </div>
</details>