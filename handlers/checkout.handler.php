<?php
require_once BASE_PATH . '/bootstrap.php'; 
require_once UTILS_PATH . '/auth.util.php';

Auth::init();

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['cart']) || empty($data['cart'])) {
    http_response_code(400);
    echo json_encode(["message" => "Cart is empty."]);
    exit;
}

$user = $_SESSION['user'] ?? null;

if (!$user) {
    http_response_code(403);
    echo json_encode(["message" => "User not logged in."]);
    exit;
}

// ISA ISANG ITEM INIINSERT NA GALING SA CART PINASA THROUGH POST AND JSON
try {
    $pdo->beginTransaction();

    //THIS IS ONLY INSERTION FOR users_items

    foreach ($data['cart'] as $item) {
        $stmt = $pdo->prepare("
            INSERT INTO users_items (user_id, item_name, item_category, quantity, price, total)
            VALUES (:user_id, :item_name, :item_category, :quantity, :price, :total)
        ");

        $stmt->execute([
            ':user_id' => $user['id'],
            ':item_name' => $item['name'],
            ':item_category' => $item['category'],
            ':quantity' => $item['quantity'],
            ':price' => $item['price'],
            ':total' => $item['price'] * $item['quantity']
        ]);
    }

    $updateStmt = $pdo->prepare(
        "UPDATE items
            SET quantity = quantity - :purchased_quantity
            WHERE name = :item_name AND category = :item_category"
    );

    $updateStmt = $pdo->execute(
        [':purchased_quantity' => $item['quantity'],
        ':item_name' => $item['name'],
        ':item_category' => $item['category']]
    );

    $pdo->commit();

    //TODO: DATABASE CREATE A WAY TO MINUS THE QUANTITY OF EACH ITEM TO THE CORRESPONDING ITEM IN THE ITEMS DATABASE
    
    echo json_encode(["message" => "Order placed successfully."]); //ETO UNG PARANG REPLY SA PINASA, NIRERECIEVE PAPUNTA DUN SA RESPONSE SA STORE.JS

} catch (Exception $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo json_encode(["message" => "Checkout failed.", "error" => $e->getMessage()]);
}