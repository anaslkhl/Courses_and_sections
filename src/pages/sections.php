<?php
function get_section_data()
{

    try {
        $conx = new PDO('mysql:host=mysql;dbname=mydb', 'root', 'roopasst');
        echo '<p style="color: green">Connected Successfully</p>' . '<br>';
    } catch (PDOException $err) {
    }
    $query = $conx->query('SELECT * FROM sections');

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
?>


<div class="sections-container">
    <h2>Sections List</h2>

    <table class="sections-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Position</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $sections = get_section_data();
            foreach ($sections as $section) {
                echo '<tr>
                <td>' . htmlspecialchars($section['id']) . '</td>
                <td>3</td>
                <td>' . htmlspecialchars($section['title']) . '</td>
                <td>' . htmlspecialchars($section['content']) . '</td>
                <td>' . htmlspecialchars($section['position']) . '</td>
                <td>' . htmlspecialchars($section['started_at']) . '</td>
               <td class="actions">
                    <a href="/index.php?page=editsections&id=' . $section['id'] . '&action=edit">✏️ Edit</a>
                    <a href="/index.php?page=editsections&id=' . $section['id'] . '&action=delete" 
                    onclick="return confirm(\'Are you sure you want to delete this section?\')">🗑️ Delete</a>
                </td>
            </tr>';
            }
            ?>

        </tbody>
    </table>
</div>


<style>
    /* ===== Sections Container ===== */
    .sections-container {
        width: 1200px;
        margin: 40px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    /* Title */
    .sections-container h2 {
        margin-bottom: 20px;
        font-size: 22px;
        font-weight: 700;
        color: #111827;
    }

    /* ===== Table ===== */
    .sections-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    /* Header */
    .sections-table thead {
        background-color: #f3f4f6;
    }

    .sections-table th {
        padding: 12px;
        text-align: left;
        font-weight: 600;
        color: #374151;
        border-bottom: 2px solid #e5e7eb;
    }

    /* Body rows */
    .sections-table td {
        padding: 12px;
        border-bottom: 1px solid #e5e7eb;
        color: #374151;
        vertical-align: top;
    }

    /* Zebra striping */
    .sections-table tbody tr:nth-child(even) {
        background-color: #fafafa;
    }

    /* Hover */
    .sections-table tbody tr:hover {
        background-color: #f0f9ff;
    }

    /* Content column (limit height) */
    .sections-table td:nth-child(4) {
        max-width: 280px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* ===== Actions ===== */
    .actions {
        display: flex;
        gap: 10px;
    }

    /* Buttons */
    .edit-btn,
    .delete-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }

    /* Edit */
    .edit-btn {
        background-color: #e0e7ff;
        color: #4338ca;
    }

    .edit-btn:hover {
        background-color: #c7d2fe;
    }

    /* Delete */
    .delete-btn {
        background-color: #fee2e2;
        color: #b91c1c;
    }

    .delete-btn:hover {
        background-color: #fecaca;
    }

    /* Click effect */
    .edit-btn:active,
    .delete-btn:active {
        transform: scale(0.95);
    }

    /* ===== Responsive ===== */
    @media (max-width: 900px) {
        .sections-table thead {
            display: none;
        }

        .sections-table,
        .sections-table tbody,
        .sections-table tr,
        .sections-table td {
            display: block;
            width: 100%;
        }

        .sections-table tr {
            margin-bottom: 18px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px;
        }

        .sections-table td {
            border: none;
            padding: 6px 0;
        }

        .sections-table td::before {
            content: attr(data-label);
            font-weight: 600;
            color: #6b7280;
            display: block;
            margin-bottom: 2px;
        }

        .actions {
            margin-top: 10px;
        }
    }
</style>