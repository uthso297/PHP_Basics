<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $title = trim($_POST['title'] ?? '');
        if (!empty($title)) {
            $stmt = $pdo->prepare("INSERT INTO tasks (title) VALUES (?)");
            $stmt->execute([$title]);
        }
    }

    if ($action === 'delete') {
        $id = $_POST['id'] ?? 0;
        if ($id > 0) {
            $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
            $stmt->execute([$id]);
        }
    }

    if ($action === 'toggle') {
        $id = $_POST['id'] ?? 0;
        $current_status = $_POST['status'] ?? 'pending';
        $new_status = ($current_status === 'pending') ? 'completed' : 'pending';

        if ($id > 0) {
            $stmt = $pdo->prepare("UPDATE tasks SET status = ? WHERE id = ?");
            $stmt->execute([$new_status, $id]);
        }
    }

    header("Location: index.php");
    exit;
}
