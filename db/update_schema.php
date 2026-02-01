<?php
require_once __DIR__ . '/connection.php';

try {
    // 1. Create subcategories table
    $sql1 = "CREATE TABLE IF NOT EXISTS `subcategories`(
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(100) NOT NULL,
        `image_url` VARCHAR(255),
        `description` TEXT,
        `category_id` INT NOT NULL,
        FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE
    );";
    $pdo->exec($sql1);
    echo "Table 'subcategories' created or already exists.\n";

    // 2. Add subcategory_id to products if it doesn't exist
    // Simple check: describe products
    $stmt = $pdo->query("DESCRIBE products");
    $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (!in_array('subcategory_id', $columns)) {
        $sql2 = "ALTER TABLE `products` ADD COLUMN `subcategory_id` INT DEFAULT NULL AFTER `category_id`;";
        $pdo->exec($sql2);
        echo "Column 'subcategory_id' added to 'products'.\n";

        $sql3 = "ALTER TABLE `products` ADD CONSTRAINT `fk_products_subcategory` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories`(`id`) ON DELETE SET NULL;";
        $pdo->exec($sql3);
        echo "Foreign key constraint added for 'subcategory_id'.\n";
    } else {
        echo "Column 'subcategory_id' already exists in 'products'.\n";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>