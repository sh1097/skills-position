<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Assignment System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Skill Assignment System</h1>
    <form action="process_form.php" method="post" onsubmit="return validateForm()">
        <label for="position">Select Position:</label>
        <select name="position" id="position" onchange="fetchSelectedSkills()">
        </select>
   
        <br>
        
        <label for="skills">Skill Set:</label>
        <select name="skills" id="skills" multiple>
        </select>
        
        <button type="button" onclick="moveSkill()"> > </button>
        
        <label for="addedSkills">Selected Skills:</label>
        <select name="addedSkills" id="addedSkills" multiple>
        </select> 
        
        <button type="button" onclick="removeSkill()"> < </button>
        
        <br>
        
        <input type="submit" value="Submit">
    </form>
    
    <script src="script.js"></script>
</body>
</html>
