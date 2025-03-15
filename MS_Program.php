<?php 
// Function to read the CSV file and return data as an array
function readCSV($filename) {
    $rows = [];
    if (($file = fopen($filename, "r")) !== FALSE) {
        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            $rows[] = $data;
        }
        fclose($file);
    }
    return $rows;
}

// Load CSV data
$data = readCSV("MS_Program.csv");

// Extract unique IDs and years for dropdowns
$ids = [];
$years = [];
if (!empty($data)) {
    for ($i = 1; $i < count($data); $i++) { // Skip header
        $ids[] = $data[$i][0];  // Assuming ID is in column 0
        $years[] = $data[$i][2]; // Assuming Year is in column 2
    }
}

// Handle filters
$search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
$selectedID = isset($_GET['id']) ? trim($_GET['id']) : '';
$selectedYear = isset($_GET['year']) ? trim($_GET['year']) : '';

// Pagination settings
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page); // Ensure the page is at least 1

$filteredData = [];
if (!empty($data)) {
    for ($i = 1; $i < count($data); $i++) {
        $row = $data[$i];
        $rowID = $row[0]; // ID column
        $rowYear = $row[2]; // Year column
        $rowText = strtolower(implode(" ", $row)); // Full row as a string

        // Apply search filter, ID dropdown filter, and Year filter
        if (
            ($search === '' || strpos($rowText, $search) !== false) &&
            ($selectedID === '' || $selectedID == $rowID) &&
            ($selectedYear === '' || $selectedYear == $rowYear)
        ) {
            $filteredData[] = $row;
        }
    }
}

// Calculate total pages
$totalRecords = count($filteredData);
$totalPages = ceil($totalRecords / $limit);
$page = min($page, $totalPages); // Ensure the page is not greater than total pages

// Slice the filtered data for the current page
$offset = ($page - 1) * $limit;
$displayData = array_slice($filteredData, $offset, $limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P</title>
    <style>
        table { width: 93%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left;   }
        tr:nth-child(even) { background-color:rgb(255, 255, 255);}
        tr:nth-child(odd) { background-color: rgb(248, 240, 240); }
        tr:hover { background-color: #ddd; }
        th { background-color: rgb(123, 177, 228); }
        input, select, button { padding: 5px; margin-right: 5px; }
        .pagination { margin-top: 15px; }
        .pagination a { padding: 8px 12px; margin: 2px; border: 1px solid #ccc; text-decoration: none; color: black; }
        .pagination a.active { background-color: #4CAF50; color: white; }
        .pagination a:hover { background-color: #ddd; }
    </style>
</head>
<body>

<h2 >MS Course List</h2>

<!-- Search & Dropdown Form -->
<form method="GET">
    <input type="text" name="search" placeholder="Search by Name or Email" value="<?php echo htmlspecialchars($search); ?>">
    
 

 
    
    <button type="submit">Search</button>
</form>

<!-- Display Table -->
<table>
    <?php
    if (!empty($data)) {
        echo "<tr>";
        foreach ($data[0] as $header) {
            echo "<th>" . htmlspecialchars($header) . "</th>";
        }
        echo "</tr>";

        if (!empty($displayData)) {
            foreach ($displayData as $row) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found.</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No data found.</td></tr>";
    }
    ?>
</table>

<!-- Pagination Links -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?search=<?php echo urlencode($search); ?>&id=<?php echo $selectedID; ?>&year=<?php echo $selectedYear; ?>&page=1">First</a>
        <a href="?search=<?php echo urlencode($search); ?>&id=<?php echo $selectedID; ?>&year=<?php echo $selectedYear; ?>&page=<?php echo ($page - 1); ?>">Prev</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?search=<?php echo urlencode($search); ?>&id=<?php echo $selectedID; ?>&year=<?php echo $selectedYear; ?>&page=<?php echo $i; ?>"
           class="<?php echo ($i == $page) ? 'active' : ''; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?search=<?php echo urlencode($search); ?>&id=<?php echo $selectedID; ?>&year=<?php echo $selectedYear; ?>&page=<?php echo ($page + 1); ?>">Next</a>
        <a href="?search=<?php echo urlencode($search); ?>&id=<?php echo $selectedID; ?>&year=<?php echo $selectedYear; ?>&page=<?php echo $totalPages; ?>">Last</a>
    <?php endif; ?>
</div>

</body>
</html>
