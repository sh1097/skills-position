<?php
include("db_config.php");
// Fetch selected skills for the chosen position
$positionId = $_GET['position_id'];
$sql = "SELECT s.skill_id, s.skill_name FROM skills s
        INNER JOIN position_skills ps ON s.skill_id = ps.skill_id
        WHERE ps.position_id = $positionId";
$result = $conn->query($sql);

$selectedSkills = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $selectedSkills[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($selectedSkills);
?>
