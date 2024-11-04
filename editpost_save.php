<?php
session_start();
$cat = $_POST['category'];
$title = $_POST['topic'];
$content = $_POST['comment'];
$id = $_POST['post_id'];
try {
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE post SET title = :title, content = :content, cat_id = :cat WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':cat', $cat);
    $stmt->bindParam(':id', $id);

    $stmt->execute();
    $_SESSION['edited'] = "success";
    header("Location: editpost.php?id=$id&userid=" . $_SESSION['id']);
    exit();
} catch (PDOException $e) {
    echo "Error: " . htmlspecialchars($e->getMessage());
}
$conn = null;
?>
