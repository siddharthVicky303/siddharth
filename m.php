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
$data = readCSV("data.csv");

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP File Handling with Table, Filters</title>
    <style>
        table { width: 93%; border-collapse: collapse; margin-top: 10px; }
        th, td {  border: 1px solid black; padding: 8px; text-align: left; background-color:rgb(245, 245, 245);}
         /* Style for even rows */
         tr:nth-child(even) {
            background-color:rgb(192, 45, 45);
        }

        /* Style for odd rows */
        tr:nth-child(odd) {
            background-color:rgb(154, 189, 31);
        }

        /* Optional: Hover effect */
        tr:hover {
            background-color: #ddd;
        }
        th { background-color:rgb(220, 229, 138); }
        input, select, button { padding: 5px; margin-right: 5px; }
    </style>
</head>
<body>

<h2>Publication Details</h2>

<!-- Search & Dropdown Form -->
<form method="GET">
    <input type="text" name="search" placeholder="Search by Name or Email" value="<?php echo htmlspecialchars($search); ?>">
    
    <select name="id">
        <option value="">Select ID</option>
        <?php foreach (array_unique($ids) as $id) : ?>
            <option value="<?php echo $id; ?>" <?php echo ($id == $selectedID) ? 'selected' : ''; ?>><?php echo $id; ?></option>
        <?php endforeach; ?>
    </select>

    <select name="year">
        <option value="">Select Year</option>
        <?php foreach (array_unique($years) as $year) : ?>
            <option value="<?php echo $year; ?>" <?php echo ($year == $selectedYear) ? 'selected' : ''; ?>><?php echo $year; ?></option>
        <?php endforeach; ?>
    </select>
    
    <button type="submit">Search</button>
</form>

<!-- Display Table -->
<table table-striped>
    <?php
    if (!empty($data)) {
        echo "<tr>";
        foreach ($data[0] as $header) {
            echo "<th>" . htmlspecialchars($header) . "</th>";
        }
        echo "</tr>";

        // Loop through each row, apply filters, and display data
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
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }
        }
    } else {
        echo "<tr><td colspan='3'>No data found.</td></tr>";
    }
    ?>
</table>

</body>
</html>
