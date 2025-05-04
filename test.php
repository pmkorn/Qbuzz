<?php
$conn = new mysqli("localhost", "username", "password", "database");

$results_per_page = 10;

$result = $conn->query("SELECT COUNT(*) AS total FROM posts");
$row = $result->fetch_assoc();
$total_results = $row['total'];
$total_pages = ceil($total_results / $results_per_page);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
if ($page > $total_pages) $page = $total_pages;

$start_from = ($page - 1) * $results_per_page;

$sql = "SELECT * FROM posts LIMIT $start_from, $results_per_page";
$result = $conn->query($sql);

// Display results
echo "<div class='container mt-4'>";
while ($row = $result->fetch_assoc()) {
    echo "<div class='card mb-2'><div class='card-body'>" . htmlspecialchars($row['title']) . "</div></div>";
}
echo "</div>";

// Pagination controls
echo "<nav aria-label='Page navigation'><ul class='pagination justify-content-center mt-4'>";

// First and Prev
if ($page > 1) {
    echo "<li class='page-item'><a class='page-link' href='?page=1'>First</a></li>";
    echo "<li class='page-item'><a class='page-link' href='?page=" . ($page - 1) . "'>Prev</a></li>";
} else {
    echo "<li class='page-item disabled'><span class='page-link'>First</span></li>";
    echo "<li class='page-item disabled'><span class='page-link'>Prev</span></li>";
}

// Numbered links
for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) {
    if ($i == $page) {
        echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
    } else {
        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
    }
}

// Next and Last
if ($page < $total_pages) {
    echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "'>Next</a></li>";
    echo "<li class='page-item'><a class='page-link' href='?page=$total_pages'>Last</a></li>";
} else {
    echo "<li class='page-item disabled'><span class='page-link'>Next</span></li>";
    echo "<li class='page-item disabled'><span class='page-link'>Last</span></li>";
}

echo "</ul></nav>";
?>
