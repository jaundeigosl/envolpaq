<?php

require_once __DIR__ . "/../../../config.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Envolpaq</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon" sizes="256x256" />

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>views/pages/producto/producto_styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&amp;family=Space+Grotesk:wght@400;700&amp;display=swap"
        rel="stylesheet" />
</head>

<body class="font-body antialiased bg-background">
    <div class="flex flex-col min-h-screen">
        <header class="sticky top-0 z-50 w-full border-b border-primary/20 bg-primary text-primary-foreground">
            <div class="container header-container flex h-14 items-center">
                <a class="mr-6 flex items-center space-x-2" href="<?php echo BASE_URL ?>index.php">
                    <img id="logo" alt="Logo Envolpaq" loading="lazy" decoding="async" data-nimg="1"
                        src="<?php echo BASE_URL ?>public/imagenes/envolpaq_logo.png" />
                </a>
                <nav class="hidden flex-1 items-center space-x-6 text-sm font-medium md:flex">
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground"
                        href="<?php echo BASE_URL ?>index.php">Inicio</a>
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground"
                        href="<?php echo BASE_URL ?>index.php#about">Quiénes Somos</a>
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground"
                        href="<?php echo BASE_URL ?>index.php#services">Servicios</a>
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground"
                        href="<?php echo BASE_URL ?>index.php#whyus">Por Qué Elegirnos</a>
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground"
                        href="<?php echo BASE_URL ?>index.php#contact">Contacto</a>
                    <a class="text-primary-foreground/80 transition-colors hover:text-primary-foreground"
                        href="<?php echo BASE_URL ?>controllers/controller_category.php">Catalago</a>
                </nav>
                <div class="flex flex-1 items-center justify-end space-x-2">
                    <a class="items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 h-10 px-4 py-2 hidden md:inline-flex bg-accent hover:bg-accent/90 text-accent-foreground"
                        href="<?php echo BASE_URL ?>index.php#contact">Solicitar Asesoría</a>
                </div>
                <!-- Mobile Menu Button -->
                <div id="mobile-menu-btn"
                    class="inline-flex items-center justify-center p-2 rounded-md text-black md:hidden hover:bg-transparent focus:outline-none ml-auto">
                    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true" style="color: black;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>

            <!-- Mobile Menu (Hidden by default) -->
            <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="<?php echo BASE_URL ?>index.php"
                        class="text-black hover:bg-gray-100 block px-3 py-2 rounded-md text-base font-medium">Inicio</a>
                    <a href="#about"
                        class="text-black hover:bg-gray-100 block px-3 py-2 rounded-md text-base font-medium">Quiénes
                        Somos</a>
                    <a href="<?php echo BASE_URL ?>index.php#services"
                        class="text-black hover:bg-gray-100 block px-3 py-2 rounded-md text-base font-medium">Servicios</a>
                    <a href="<?php echo BASE_URL ?>index.php#whyus"
                        class="text-black hover:bg-gray-100 block px-3 py-2 rounded-md text-base font-medium">Por Qué
                        Elegirnos</a>
                    <a href="<?php echo BASE_URL ?>controllers/controller_category.php"
                        class="text-black hover:bg-gray-100 block px-3 py-2 rounded-md text-base font-medium">Catálogo</a>
                    <a href="<?php echo BASE_URL ?>index.php#contact"
                        class="text-black hover:bg-gray-100 block px-3 py-2 rounded-md text-base font-medium">Contacto</a>
                </div>
            </div>
        </header>

        <main class="flex-1">
            <section class="py-12 bg-secondary/30">
                <div class="container text-center">
                    <a href="<?php echo BASE_URL; ?>controllers/controller_category.php"
                        class="inline-flex items-center text-sm text-muted-foreground hover:text-primary mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="mr-2">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
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
                <div id="container-table" class="container">

                    <?php if (empty($productos)): ?>
                        <div
                            class="flex flex-col items-center justify-center py-24 px-4 text-center bg-white rounded-2xl shadow-lg border border-gray-100 max-w-2xl mx-auto mt-8">
                            <div class="bg-red-50 p-4 rounded-full mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                    fill="none" stroke="#dc2626" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z" />
                                    <path d="m3.3 7 8.7 5 8.7-5" />
                                    <path d="M12 22V12" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Aún no hay productos aquí</h3>
                            <p class="text-black text-lg max-w-md" style="color: #000000 !important;">
                                Estamos trabajando para agregar los mejores productos de esta categoría a nuestro catálogo.
                            </p>
                            <a href="<?php echo BASE_URL; ?>controllers/controller_category.php"
                                class="mt-8 px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                                Explorar otras categorías
                            </a>
                        </div>
                    <?php else: ?>

                        <!-- Container Único estilo Tabla/Lista -->
                        <div
                            class="bg-white rounded-xl shadow-sm border border-border overflow-hidden divide-y divide-border">
                            <?php foreach ($productos as $producto): ?>
                                <?php include __DIR__ . '/../../components/product-item.php'; ?>
                            <?php endforeach; ?>
                        </div>

                    <?php endif; ?>

                </div>
            </section>
        </main>

        <footer class="bg-primary text-primary-foreground">
            <div class="container py-8">
                <div class="footer-content flex flex-col md:flex-row items-center justify-between gap-6">

                    <a class="flex items-center space-x-2" href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-box h-6 w-6">
                            <path
                                d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z">
                            </path>
                            <path d="m3.3 7 8.7 5 8.7-5"></path>
                            <path d="M12 22V12"></path>
                        </svg>
                        <span class="font-bold font-headline text-lg">Envolpaq</span>
                    </a>

                    <p class="footer-copyright text-sm">© 2025 Envolpaq. Todos los derechos reservados.</p>

                    <div class="social-icons flex items-center gap-2">
                        <a href="https://facebook.com/envolpaq" target="_blank" rel="noopener noreferrer"
                            aria-label="Facebook" class="footer-social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-facebook h-5 w-5">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>

                        <a href="tel:4448143689" aria-label="Llamar por teléfono" class="footer-social-link">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" stroke-miterlimit="10" stroke-width="32"
                                    d="M451 374c-15.88-16-54.34-39.35-73-48.76-24.3-12.24-26.3-13.24-45.4.95-12.74 9.47-21.21 17.93-36.12 14.75s-47.31-21.11-75.68-49.39-47.34-61.62-50.53-76.48 5.41-23.23 14.79-36c13.22-18 12.22-21 .92-45.3-8.81-18.9-32.84-57-48.9-72.8C119.9 44 119.9 47 108.83 51.6A160.15 160.15 0 0 0 83 65.37C67 76 58.12 84.83 51.91 98.1s-9 44.38 23.07 102.64 54.57 88.05 101.14 134.49S258.5 406.64 310.85 436c64.76 36.27 89.6 29.2 102.91 23s22.18-15 32.83-31a159.09 159.09 0 0 0 13.8-25.8C465 391.17 468 391.17 451 374z">
                                </path>
                            </svg>
                        </a>

                        <a href="mailto:envolpaqslp@hotmail.com" target="_blank" class="footer-social-link">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                                height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <?php include __DIR__ . '/../../components/whatsapp_widget.php'; ?>
</body>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

</html>