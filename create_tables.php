<?php
include 'db_config.php';

// Create tables
$sql = "CREATE TABLE IF NOT EXISTS skills (
    skill_id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(50) NOT NULL
)";

$sql .= "CREATE TABLE IF NOT EXISTS positions (
    position_id INT AUTO_INCREMENT PRIMARY KEY,
    position_name VARCHAR(50) NOT NULL
)";

$sql .= "CREATE TABLE IF NOT EXISTS position_skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    position_id INT,
    skill_id INT,
    FOREIGN KEY (position_id) REFERENCES positions(position_id),
    FOREIGN KEY (skill_id) REFERENCES skills(skill_id)
)";

if ($conn->multi_query($sql) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error creating tables: " . $conn->error;
}

$sql = "INSERT INTO skills (skill_name) VALUES
    ('Accounting'),
    ('Computer Science'),
    ('database')";

if ($conn->query($sql) === TRUE) {
    echo "Dummy data inserted into skills table successfully";
} else {
    echo "Error inserting dummy data into skills table: " . $conn->error;
}

// Insert dummy data into positions table
$sql = "INSERT INTO positions (position_name) VALUES
    ('Position 1'),
    ('Position 2')";

if ($conn->query($sql) === TRUE) {
    echo "Dummy data inserted into positions table successfully";
} else {
    echo "Error inserting dummy data into positions table: " . $conn->error;
}

$conn->close();
?>
