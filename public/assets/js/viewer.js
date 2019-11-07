var options = document.getElementsByClassName("opt-button");
var selecteds = [];

function selecionar (index) {
    if (selecteds.includes(index)) {
        selecteds = selecteds.filter(item => item != index);
        options[index].classList = "opt-button";
    } else {
        selecteds.push(index);
        options[index].classList.add("selected");
    }

    document.getElementById("answer-input").value = selecteds.join();
}

function salvar () {
    document.getElementById("task-answer").submit();
}