<?php
    require_once __DIR__."/../../../config.php";

    if(isset($result)){
        $categories = $result;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Catálogo – Envolpaq</title>
    <meta name="description" content="Catálogo de productos de embalaje y empaque en San Luis Potosí."/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon" sizes="256x256"/>
    <link rel="stylesheet" href="<?php echo BASE_URL?>styles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL?>views/pages/catalogo/catalogo_styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&amp;family=Space+Grotesk:wght@400;700&amp;display=swap" rel="stylesheet"/>
</head>
<body class="font-body antialiased">
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
            <section class="relative w-full py-16 bg-primary text-primary-foreground flex justify-center items-center overflow-hidden">
                 <div class="absolute inset-0 bg-primary/90 z-0"></div>
                <div class="container relative z-10 text-center">
                    <h1 class="font-headline text-3xl md:text-5xl font-bold tracking-tighter">Nuestro Catálogo</h1>
                    <p class="mt-4 text-lg text-primary-foreground/80 max-w-2xl mx-auto text-center">
                        Explora nuestras categorías de soluciones en empaque y embalaje profesional.
                    </p>
                </div>
            </section>

            <section class="py-16 md:py-24 bg-background">
                <div class="container">

                    <?php 
                    
                        if(!isset($categories)):
                    ?>
                            <div>
                                <h2> No tenemos productos disponibles</h2>
                            </div>

                    <?php
                       else:
                    ?>
                        
                        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                                
                            <?php 

                                foreach ($categories as $category): 
                                    include __DIR__ . '/../../components/cards.php'; 
                                endforeach; 
                            ?>

                        </div>
                    <?php
                        endif;
                    ?>
                </div>
            </section>

        </main>

        <footer class="bg-primary text-primary-foreground">
            <div class="container py-8">
                <div class="footer-content flex flex-col md:flex-row items-center justify-between gap-6">
                    
                    <a class="flex items-center space-x-2" href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-box h-6 w-6"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"></path><path d="m3.3 7 8.7 5 8.7-5"></path><path d="M12 22V12"></path></svg>
                        <span class="font-bold font-headline text-lg">Envolpaq</span>
                    </a>
                    
                    <p class="footer-copyright text-sm">© 2025 Envolpaq. Todos los derechos reservados.</p>
                    
                    <div class="social-icons flex items-center gap-2">
                        <a href="https://facebook.com/envolpaq" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="footer-social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook h-5 w-5"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        </a>
                        
                        <a href="tel:4448143689" aria-label="Llamar por teléfono" class="footer-social-link">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" stroke-miterlimit="10" stroke-width="32" d="M451 374c-15.88-16-54.34-39.35-73-48.76-24.3-12.24-26.3-13.24-45.4.95-12.74 9.47-21.21 17.93-36.12 14.75s-47.31-21.11-75.68-49.39-47.34-61.62-50.53-76.48 5.41-23.23 14.79-36c13.22-18 12.22-21 .92-45.3-8.81-18.9-32.84-57-48.9-72.8C119.9 44 119.9 47 108.83 51.6A160.15 160.15 0 0 0 83 65.37C67 76 58.12 84.83 51.91 98.1s-9 44.38 23.07 102.64 54.57 88.05 101.14 134.49S258.5 406.64 310.85 436c64.76 36.27 89.6 29.2 102.91 23s22.18-15 32.83-31a159.09 159.09 0 0 0 13.8-25.8C465 391.17 468 391.17 451 374z"></path>
                            </svg>
                        </a>

                        <a href="" target="_blank" class="footer-social-link">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>