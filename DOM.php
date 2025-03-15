<?php
// Function to read CSV file and return data as an array
function readCSV($filename) {
    if (!file_exists($filename)) {
        die("CSV file not found.");
    }

    $file = fopen($filename, "r"); // Open CSV file
    $data = [];
    $headers = fgetcsv($file); // Read column headers

    while (($row = fgetcsv($file)) !== false) {
        $data[] = array_combine($headers, $row); // Associate headers with values
    }
    fclose($file);
    return $data;
}

$csvFile = "alumni.csv"; // Your CSV file
$students = readCSV($csvFile);

// Get search query from user input
$searchQuery = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data with Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #e4e48b; } /* Light Yellow Header */
        img { width: 100px; height: 100px; object-fit: cover; border-radius: 5px; }
        a { color: blue; text-decoration: none; font-weight: bold; }
        a:hover { text-decoration: underline; }
        .search-bar { margin-bottom: 20px; }
        input[type="text"] { padding: 8px; width: 300px; }
        button { padding: 8px; background: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background: #45a049; }
    </style>
</head>
<body>

    <h2>Student Information</h2>

    <!-- Search Form -->
    <form method="GET" class="search-bar">
        <input type="text" name="search" placeholder="Search by Name, Passing Year, or Research Topic" value="<?php echo htmlspecialchars($searchQuery); ?>">
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>S/N</th>
            <th>Student Details</th>
            <th>Image</th>
        </tr>
        <?php 
        $found = false;
        foreach ($students as $student): 
            $studentDetails = strtolower(strip_tags($student['Student Detail'])); // Convert to lowercase and remove HTML tags
            if ($searchQuery === '' || strpos($studentDetails, $searchQuery) !== false):
                $found = true;
        ?>
            <tr>
                <td><?php echo $student['s/n']; ?></td>
                <td><?php echo $student['Student Detail']; // Display HTML links ?></td>
                <td>
                    <?php 
                    $imagePath = $student['Image'];
                    if (file_exists($imagePath)) {
                        echo "<img src='$imagePath' alt='Student Image'>";
                    } else {
                        echo "<p>Image Not Found</p>";
                    }
                    ?>
                </td>
            </tr>
        <?php 
            endif;
        endforeach; 

        if (!$found):
            echo "<tr><td colspan='3' style='text-align:center; color:red;'>No results found</td></tr>";
        endif;
        ?>
    </table>

</body>
</html>
