<?php
require 'db.php';

// Fetch all tasks
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager Pro</title>
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Task Manager</h1>
        
        <form action="actions.php" method="POST">
            <input type="hidden" name="action" value="add">
            <input type="text" name="title" placeholder="What needs to be done?" required autocomplete="off">
            <button type="submit">Add Task</button>
        </form>

        <div class="task-list">
            <?php if (empty($tasks)): ?>
                <p class="empty-state">No tasks yet. Add one above! ✨</p>
            <?php else: ?>
                <?php foreach ($tasks as $task): ?>
                    <div class="task-item <?= $task['status'] === 'completed' ? 'completed' : '' ?>">
                        <div class="task-content">
                            <span class="task-title"><?= htmlspecialchars($task['title']) ?></span>
                        </div>
                        <div class="actions">
                            <!-- Toggle Status -->
                            <form action="actions.php" method="POST" style="margin: 0;">
                                <input type="hidden" name="action" value="toggle">
                                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                <input type="hidden" name="status" value="<?= $task['status'] ?>">
                                <button type="submit" class="btn-action btn-complete" title="<?= $task['status'] === 'completed' ? 'Undo' : 'Complete' ?>">
                                    <?php if ($task['status'] === 'completed'): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                                    <?php else: ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/></svg>
                                    <?php endif; ?>
                                </button>
                            </form>

                            <!-- Delete -->
                            <form action="actions.php" method="POST" style="margin: 0;" onsubmit="return confirm('Delete this task?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                <button type="submit" class="btn-action btn-delete" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
