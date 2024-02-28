function fetchSelectedSkills() {
    var positionId = document.getElementById("position").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var selectedSkills = JSON.parse(xhr.responseText);
            var addedSkillsSelect = document.getElementById("addedSkills");
            addedSkillsSelect.innerHTML = ''; // Clear the select box
            selectedSkills.forEach(function(skill) {
                var option = document.createElement("option");
                option.text = skill.skill_name;
                option.value = skill.skill_id;
                addedSkillsSelect.add(option);
            });
        }
    };
    xhr.open("GET", "get_selected_skills.php?position_id=" + positionId, true);
    xhr.send();
}

function moveSkill() {
    var skillsSelect = document.getElementById("skills");
    var addedSkillsSelect = document.getElementById("addedSkills");
    for (var i = 0; i < skillsSelect.options.length; i++) {
        if (skillsSelect.options[i].selected) {
            var newOption = document.createElement("option");
            newOption.text = skillsSelect.options[i].text;
            newOption.value = skillsSelect.options[i].value;
            addedSkillsSelect.add(newOption);
            skillsSelect.remove(i);
            i--;
        }
    }
}

function removeSkill() {
    var addedSkillsSelect = document.getElementById("addedSkills");
    var skillsSelect = document.getElementById("skills");
    for (var i = 0; i < addedSkillsSelect.options.length; i++) {
        if (addedSkillsSelect.options[i].selected) {
            var newOption = document.createElement("option");
            newOption.text = addedSkillsSelect.options[i].text;
            newOption.value = addedSkillsSelect.options[i].value;
            skillsSelect.add(newOption);
            addedSkillsSelect.remove(i);
            i--;
        }
    }
}

function validateForm() {
    var positionSelect = document.getElementById("position");
    var skillsSelect = document.getElementById("addedSkills");

    if (positionSelect.value === "") {
        alert("Please select a position.");
        return false;
    }

    if (skillsSelect.options.length === 0) {
        alert("Please select at least one skill.");
        return false;
    }


    return true;
}

