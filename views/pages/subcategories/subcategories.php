<?php
require_once __DIR__ . "/../../../config.php";

if (isset($result)) {
    $subcategories = $result;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Subcategorías – Envolpaq</title>
    <meta name="description" content="Subcategorías de productos de embalaje y empaque." />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" sizes="256x256" />
    <link rel="stylesheet" href="<?php echo BASE_URL ?>styles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>views/pages/subcategories/subcategories_styles.css">
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
                    <a href="<?php echo BASE_URL ?>index.php#about"
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
            <section
                class="relative w-full py-16 bg-primary text-primary-foreground flex justify-center items-center overflow-hidden">
                <div class="absolute inset-0 bg-primary/90 z-0"></div>
                <div id="hero-subcategory" class="container relative z-10 text-center">
                    <a href="<?php echo BASE_URL; ?>controllers/controller_category.php"
                        class="inline-flex items-center text-sm text-primary-foreground/80 hover:text-white mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="mr-2">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                        Volver a Categorías
                    </a>
                    <h1 class="font-headline text-3xl md:text-5xl font-bold tracking-tighter">
                        <?php echo isset($categoria_actual['name']) ? $categoria_actual['name'] : 'Subcategorías'; ?>
                    </h1>
                    <?php if (isset($categoria_actual['description'])): ?>
                        <p class="mt-4 text-lg text-primary-foreground/80 max-w-2xl mx-auto text-center">
                            <?php echo $categoria_actual['description']; ?>
                        </p>
                    <?php endif; ?>
                </div>
            </section>

            <section class="py-16 md:py-24 bg-background">
                <div class="container">

                    <?php if (!isset($subcategories) || empty($subcategories)): ?>
                        <div
                            class="flex flex-col items-center justify-center py-24 px-4 text-center bg-white rounded-2xl shadow-lg border border-gray-100 max-w-2xl mx-auto mt-8">
                            <div class="bg-red-50 p-4 rounded-full mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                    fill="none" stroke="#dc2626" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="8" y1="12" x2="16" y2="12" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">No hay subcategorías disponibles</h3>
                            <p class="text-black text-lg max-w-md" style="color: #000000 !important;">
                                Por el momento no hemos agregado subcategorías a esta sección. Te invitamos a revisar los
                                productos generales.
                            </p>
                            <a href="<?php echo BASE_URL; ?>controllers/controller_category.php"
                                class="mt-8 px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                                Volver al catálogo
                            </a>
                        </div>
                    <?php else: ?>

                        <div class="grid gap-8 md:grid-cols-3">
                            <?php foreach ($subcategories as $subcategory):
                                include __DIR__ . '/../../components/subcategory_card.php';
                            endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </main>

        <footer class="bg-primary text-primary-foreground">
            <div class="container py-8">
                <div class="footer-content flex flex-col md:flex-row items-center justify-between gap-6">
                    <a class="flex items-center space-x-2" href="/">
                        <span class="font-bold font-headline text-lg">Envolpaq</span>
                    </a>
                    <p class="footer-copyright text-sm">© 2025 Envolpaq. Todos los derechos reservados.</p>
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