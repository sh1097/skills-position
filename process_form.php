<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $position = $_POST['position'];
    $selectedSkills = isset($_POST['addedSkills']) ? $_POST['addedSkills'] : [];

    if (empty($position)) {
        echo "Please select a position.";
        exit;
    }

    if (empty($selectedSkills)) {
        echo "Please select at least one skill.";
        exit;
    }

   
    try {
        foreach ($selectedSkills as $skill) {
            $sql = "INSERT INTO position_skills (position_id, skill_id) VALUES ('$position', '$skill')";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    
        $conn->close();

        echo "Form submitted successfully!";
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
} else {
    
    echo "Form not submitted.";
        header("Location: index.php");

}
?>
