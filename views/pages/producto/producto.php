<?php

require_once __DIR__."/../../../config.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Envolpaq</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon" sizes="256x256"/>
    
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&amp;family=Space+Grotesk:wght@400;700&amp;display=swap" rel="stylesheet"/>
</head>
<body class="font-body antialiased bg-background">
    <div class="flex flex-col min-h-screen">
        <header class="sticky top-0 z-50 w-full border-b border-primary/20 bg-primary text-primary-foreground">
            <div class="container header-container flex h-14 items-center">
                <a class="mr-6 flex items-center space-x-2" href="<?php echo BASE_URL?>index.php">
                    <img id="logo" alt="Logo Envolpaq" loading="lazy" src="<?php echo BASE_URL?>public/imagenes/envolpaq_logo.png"/>
                </a>
                <nav class="hidden flex-1 items-center space-x-6 text-sm font-medium md:flex">
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground" href="<?php echo BASE_URL?>index.php">Inicio</a>
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground" href="<?php echo BASE_URL?>index.php#about">Quiénes Somos</a>
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground" href="<?php echo BASE_URL?>index.php#services">Servicios</a>
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground" href="<?php echo BASE_URL?>index.php#whyus">Por Qué Elegirnos</a>
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground" href="<?php echo BASE_URL?>controllers/controller_category.php">Catálogo</a>
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground" href="<?php echo BASE_URL?>index.php#contact">Contacto</a>
                </nav>
                <div class="flex flex-1 items-center justify-end space-x-2">
                    <a class="items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors h-10 px-4 py-2 hidden md:inline-flex bg-accent hover:bg-accent/90 text-accent-foreground" href="<?php echo BASE_URL?>index.php#contact">Solicitar Asesoría</a>
                </div>
            </div>
        </header>

        <main class="flex-1">
            <section class="py-12 bg-secondary/30">
                <div class="container text-center">
                    <a href="<?php echo BASE_URL; ?>index.php?page=catalogo" class="inline-flex items-center text-sm text-muted-foreground hover:text-primary mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="m15 18-6-6 6-6"/></svg>
                        Volver a Categorías
                    </a>
                    <h1 class="font-headline text-3xl md:text-5xl font-bold text-primary tracking-tight">
                        <?php echo $categoria_actual['name']; ?>
                    </h1>
                    <p class="mt-2 text-lg text-muted-foreground max-w-2xl mx-auto">
                        <?php echo $categoria_actual['description']; ?>
                    </p>
                </div>
            </section>

            <section class="py-12 bg-background">
                <div class="container">
                    
                    <?php if (empty($productos)): ?>
                        <div class="text-center py-20 bg-secondary/20 rounded-lg border border-dashed border-border">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="mx-auto text-muted-foreground mb-4"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg>
                            <h3 class="text-xl font-bold text-primary">Aún no hay productos aquí</h3>
                            <p class="text-muted-foreground">Estamos actualizando nuestro inventario para esta categoría.</p>
                        </div>
                    <?php else: ?>
                        
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            <?php foreach ($productos as $producto): ?>
                                <?php include __DIR__ . '/../../components/product-item.php'; ?>
                            <?php endforeach; ?>
                        </div>

                    <?php endif; ?>
                    
                </div>
            </section>
        </main>

        <footer class="bg-primary text-primary-foreground py-8 mt-auto">
            <div class="container text-center">
                <p class="text-sm">© 2025 Envolpaq. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>

</body>

 <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
</script>

</html>