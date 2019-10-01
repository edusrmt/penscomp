var options = document.getElementsByClassName("opt-button");
var selecteds = [];

function multiselect (item) {    
    options[item].classList = "opt-button multi-selected";
}

function selecionar (index) {
    if (selecteds.includes(index)) {
        selecteds = selecteds.filter(item => item != index);
        options[index].classList = "opt-button";
        
        if (selecteds.length == 1) {
            options[selecteds[0]].classList = "opt-button single-selected";
        }
    } else {
        selecteds.push(index);

        if (selecteds.length == 1) {
            options[index].classList.add("single-selected");
        } else if (selecteds.length > 1) {
            selecteds.forEach(multiselect);
        }  
    }
}