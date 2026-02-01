<?php
require_once __DIR__ . '/auth/middleware.php';
require_once __DIR__ . '/../db/connection.php';

check_auth();

// Fetch Categories
$stmt = $pdo->query("SELECT * FROM categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch Subcategories
$stmt = $pdo->query("SELECT s.*, c.name as category_name FROM subcategories s JOIN categories c ON s.category_id = c.id");
$subcategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch Products (update query to include subcategory name)
$stmt = $pdo->query("SELECT p.*, c.name as category_name, s.name as subcategory_name FROM products p LEFT JOIN categories c ON p.category_id = c.id LEFT JOIN subcategories s ON p.subcategory_id = s.id");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare Subcategories for JS (Grouped by Category ID)
$subsByCat = [];
foreach ($subcategories as $sub) {
    $subsByCat[$sub['category_id']][] = $sub;
}
$subsJson = json_encode($subsByCat);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        :root {
            --primary: #690809;
            --secondary: #CBCAC7;
            --accent: #252523;
            --light: #f4f4f4;
        }

        body {
            font-family: sans-serif;
            margin: 0;
            background: var(--light);
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: var(--accent);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar h2 {
            margin-bottom: 40px;
            text-align: center;
        }

        .sidebar a {
            color: #ccc;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 5px;
            display: block;
            border-radius: 4px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .sidebar .logout {
            margin-top: auto;
            color: #ff6b6b;
        }

        /* Main Content */
        .main {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .section {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .section h3 {
            margin-top: 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        /* Forms */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            background: #fafafa;
            border-radius: 6px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 0.85rem;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-warning {
            background: #ffc107;
            color: black;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f8f9fa;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        /* Messages */
        .alert {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>Envolpaq Admin</h2>
        <a href="#" onclick="showSection('categories')" class="nav-link active">Categorías</a>
        <a href="#" onclick="showSection('subcategories')" class="nav-link">Subcategorías</a>
        <a href="#" onclick="showSection('products')" class="nav-link">Productos</a>
        <a href="logout.php" class="logout">Cerrar Sesión</a>
    </div>

    <div class="main">
        <div class="header">
            <h1>Panel de Control</h1>
            <span>Bienvenido, <?php echo $_SESSION['user_name']; ?></span>
        </div>

        <!-- Feedback Messages -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">Operación exitosa.</div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">Ocurrió un error: <?php echo htmlspecialchars($_GET['message'] ?? ''); ?></div>
        <?php endif; ?>

        <!-- CATEGORIES SECTION -->
        <div id="categories-section" class="section">
            <h3>Gestión de Categorías</h3>

            <!-- Category Form -->
            <form action="actions/category_actions.php" method="POST" id="categoryForm" enctype="multipart/form-data">
                <input type="hidden" name="action" id="cat_action" value="create">
                <input type="hidden" name="id" id="cat_id">

                <div class="form-grid">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" id="cat_name" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" name="description" id="cat_desc">
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Imagen</label>
                        <input type="file" name="image" id="cat_image" accept="image/*">
                        <small style="display:none;" id="cat_current_image_msg">Deja vacío para mantener la
                            actual.</small>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="cat_btn_submit">Crear Categoría</button>
                <button type="button" class="btn" onclick="resetCatForm()" style="display:none;"
                    id="cat_btn_cancel">Cancelar Edición</button>
            </form>

            <!-- Category List -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $cat): ?>
                        <tr>
                            <td><?php echo $cat['id']; ?></td>
                            <td><?php echo htmlspecialchars($cat['name']); ?></td>
                            <td><?php echo htmlspecialchars($cat['description']); ?></td>
                            <td class="actions">
                                <button class="btn btn-warning"
                                    onclick="editCategory(<?php echo $cat['id']; ?>, '<?php echo addslashes($cat['name']); ?>', '<?php echo addslashes($cat['description']); ?>')">Editar</button>

                                <form action="actions/category_actions.php" method="POST"
                                    onsubmit="return confirm('¿Eliminar esta categoría?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $cat['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- SUBCATEGORIES SECTION -->
        <div id="subcategories-section" class="section" style="display:none;">
            <h3>Gestión de Subcategorías</h3>

            <form action="actions/subcategory_actions.php" method="POST" id="subCategoryForm"
                enctype="multipart/form-data">
                <input type="hidden" name="action" id="sub_action" value="create">
                <input type="hidden" name="id" id="sub_id">

                <div class="form-grid">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" id="sub_name" required>
                    </div>
                    <div class="form-group">
                        <label>Categoría Padre</label>
                        <select name="category_id" id="sub_cat_id" required>
                            <option value="">Seleccionar Categoría...</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" name="description" id="sub_desc">
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <input type="file" name="image" id="sub_image" accept="image/*">
                        <small style="display:none;" id="sub_current_image_msg">Deja vacío para mantener la
                            actual.</small>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="sub_btn_submit">Crear Subcategoría</button>
                <button type="button" class="btn" onclick="resetSubForm()" style="display:none;"
                    id="sub_btn_cancel">Cancelar Edición</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría Padre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subcategories as $sub): ?>
                        <tr>
                            <td><?php echo $sub['id']; ?></td>
                            <td><?php echo htmlspecialchars($sub['name']); ?></td>
                            <td><?php echo htmlspecialchars($sub['category_name']); ?></td>
                            <td><?php echo htmlspecialchars($sub['description']); ?></td>
                            <td class="actions">
                                <button class="btn btn-warning"
                                    onclick="editSubCategory(<?php echo $sub['id']; ?>, '<?php echo addslashes($sub['name']); ?>', '<?php echo $sub['category_id']; ?>', '<?php echo addslashes($sub['description']); ?>')">Editar</button>

                                <form action="actions/subcategory_actions.php" method="POST"
                                    onsubmit="return confirm('¿Eliminar esta subcategoría?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $sub['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        <!-- PRODUCTS SECTION -->
        <div id="products-section" class="section" style="display:none;">
            <h3>Gestión de Productos</h3>

            <form action="actions/product_actions.php" method="POST" id="productForm">
                <input type="hidden" name="action" id="prod_action" value="create">
                <input type="hidden" name="id" id="prod_id">

                <div class="form-grid">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" id="prod_name" required>
                    </div>
                    <div class="form-group">
                        <label>Categoría</label>
                        <select name="category_id" id="prod_cat" required onchange="updateSubcategories()">
                            <option value="">Seleccionar Categoría...</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Subcategoría (Opcional)</label>
                        <select name="subcategory_id" id="prod_sub">
                            <option value="">Ninguna</option>
                            <!-- Options populated via JS -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="description" id="prod_desc" rows="2"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="prod_btn_submit">Crear Producto</button>
                <button type="button" class="btn" onclick="resetProdForm()" style="display:none;"
                    id="prod_btn_cancel">Cancelar Edición</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Subcategoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $prod): ?>
                        <tr>
                            <td><?php echo $prod['id']; ?></td>
                            <td><?php echo htmlspecialchars($prod['name']); ?></td>
                            <td><?php echo htmlspecialchars($prod['category_name']); ?></td>
                            <td><?php echo htmlspecialchars($prod['subcategory_name'] ?? '-'); ?></td>
                            <td class="actions">
                                <button class="btn btn-warning"
                                    onclick="editProduct(<?php echo $prod['id']; ?>, '<?php echo addslashes($prod['name']); ?>', '<?php echo $prod['category_id']; ?>', '<?php echo $prod['subcategory_id'] ?? ''; ?>', '<?php echo addslashes($prod['description']); ?>')">Editar</button>

                                <form action="actions/product_actions.php" method="POST"
                                    onsubmit="return confirm('¿Eliminar este producto?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $prod['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <script>
        const subsByCat = <?php echo $subsJson ?: '{}'; ?>;

        // Navigation Logic
        function showSection(sectionName) {
            document.getElementById('categories-section').style.display = 'none';
            document.getElementById('subcategories-section').style.display = 'none';
            document.getElementById('products-section').style.display = 'none';

            document.querySelectorAll('.nav-link').forEach(el => el.classList.remove('active'));

            // Highlight current link
            const links = document.querySelectorAll('.nav-link');
            links.forEach(link => {
                if (link.getAttribute('onclick').includes(sectionName)) {
                    link.classList.add('active');
                }
            });

            document.getElementById(sectionName + '-section').style.display = 'block';
        }

        // Category Edit Logic
        function editCategory(id, name, desc) {
            document.getElementById('cat_action').value = 'update';
            document.getElementById('cat_id').value = id;
            document.getElementById('cat_name').value = name;
            document.getElementById('cat_desc').value = desc;
            document.getElementById('cat_current_image_msg').style.display = 'block';
            document.getElementById('cat_btn_submit').innerText = 'Actualizar Categoría';
            document.getElementById('cat_btn_cancel').style.display = 'inline-block';
            window.scrollTo(0, 0);
        }

        function resetCatForm() {
            document.getElementById('categoryForm').reset();
            document.getElementById('cat_action').value = 'create';
            document.getElementById('cat_id').value = '';
            document.getElementById('cat_current_image_msg').style.display = 'none';
            document.getElementById('cat_btn_submit').innerText = 'Crear Categoría';
            document.getElementById('cat_btn_cancel').style.display = 'none';
        }

        // Subcategory Edit Logic
        function editSubCategory(id, name, catId, desc) {
            document.getElementById('sub_action').value = 'update';
            document.getElementById('sub_id').value = id;
            document.getElementById('sub_name').value = name;
            document.getElementById('sub_cat_id').value = catId;
            document.getElementById('sub_desc').value = desc;
            document.getElementById('sub_current_image_msg').style.display = 'block';
            document.getElementById('sub_btn_submit').innerText = 'Actualizar Subcategoría';
            document.getElementById('sub_btn_cancel').style.display = 'inline-block';
            window.scrollTo(0, 0);
        }

        function resetSubForm() {
            document.getElementById('subCategoryForm').reset();
            document.getElementById('sub_action').value = 'create';
            document.getElementById('sub_id').value = '';
            document.getElementById('sub_current_image_msg').style.display = 'none';
            document.getElementById('sub_btn_submit').innerText = 'Crear Subcategoría';
            document.getElementById('sub_btn_cancel').style.display = 'none';
        }


        // Product Logic
        function updateSubcategories(selectedSubId = null) {
            const catId = document.getElementById('prod_cat').value;
            const subSelect = document.getElementById('prod_sub');

            subSelect.innerHTML = '<option value="">Ninguna</option>'; // Reset

            if (catId && subsByCat[catId]) {
                subsByCat[catId].forEach(sub => {
                    const option = document.createElement('option');
                    option.value = sub.id;
                    option.textContent = sub.name;
                    if (selectedSubId && sub.id == selectedSubId) {
                        option.selected = true;
                    }
                    subSelect.appendChild(option);
                });
            }
        }

        function editProduct(id, name, catId, subId, desc) {
            document.getElementById('prod_action').value = 'update';
            document.getElementById('prod_id').value = id;
            document.getElementById('prod_name').value = name;
            document.getElementById('prod_cat').value = catId;
            document.getElementById('prod_desc').value = desc;

            // Trigger update of subcategories then set value
            updateSubcategories(subId);

            document.getElementById('prod_btn_submit').innerText = 'Actualizar Producto';
            document.getElementById('prod_btn_cancel').style.display = 'inline-block';

            window.scrollTo(0, 0);
        }

        function resetProdForm() {
            document.getElementById('productForm').reset();
            document.getElementById('prod_action').value = 'create';
            document.getElementById('prod_id').value = '';
            document.getElementById('prod_sub').innerHTML = '<option value="">Ninguna</option>';
            document.getElementById('prod_btn_submit').innerText = 'Crear Producto';
            document.getElementById('prod_btn_cancel').style.display = 'none';
        }
    </script>
</body>

</html>