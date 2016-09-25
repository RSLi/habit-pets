function udata_post() {
    if(udata.food < 0) {
        udata.food = 0;
    }
    if(udata.food > 100) {
        udata.food = 100;
    }
    if(udata.health < 0) {
        udata.health = 0;
    }
    if(udata.health > 100) {
        udata.health = 100;
    }
    if(udata.happiness < 0) {
        udata.happiness = 0;
    }
    if(udata.happiness > 100) {
        udata.happiness = 100;
    }
    if(udata.exp >= 100) {
        udata.exp -= 100;
        udata.level++;
    }

    method = "post";
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "udata");
    hiddenField.setAttribute("value", JSON.stringify(udata));
    form.appendChild(hiddenField);
    document.body.appendChild(form);
    form.submit();
}

function delete_array_item(arr, index) {
     arr.splice(index,1);
}

function udata_add_item(name, type, value) {
    udata.items.push({"name" : name, "type" : type, "value" : value});
}

function udata_consume_item(index) {
    if(udata.items[index].type == "food") {
        udata.food += udata.items[index].value;
    }else if(udata.items[index].type == "health") {
        udata.health += udata.items[index].value;
    }else if(udata.items[index].type == "happiness") {
        udata.happiness += udata.items[index].value;
    }
    delete_array_item(udata.items, index);
}

function udata_add_task(name, type, reward) {
    completed = false;
    difficulty = 1;
    udata.tasks.push({"name" : name, "type" : type, "completed" : completed, "difficulty" : difficulty, "reward" : reward});
}

function udata_delete_task(index) {
    delete_array_item(udata.tasks, index);
}

function udata_complete_task(index) {
    if(udata.tasks[index].type == "todo"){
        if(udata.tasks[index].reward == "food"){
            udata_add_item("breadstick", "food", 10);
            udata_add_gold(10);
            udata_add_exp(10);
        }else if(udata.tasks[index].reward == "health"){
            udata.health += 10;
            udata_add_gold(10);
            udata_add_exp(10);
        }else if(udata.tasks[index].reward == "happiness"){
            udata.happiness += 5;
            udata_add_gold(10);
            udata_add_exp(15);
        }
        delete_array_item(udata.tasks, index);
    }else if(udata.tasks[index].type == "dailies"){
        if(udata.tasks[index].reward == "food"){
            udata_add_item("breadstick", "food", 10);
            udata_add_gold(10);
            udata_add_exp(10);
        }else if(udata.tasks[index].reward == "health"){
            udata.health += 15;
            udata_add_gold(10);
            udata_add_exp(10);
        }else if(udata.tasks[index].reward == "happiness"){
            udata.happiness += 20;
            udata_add_gold(10);
            udata_add_exp(15);
        }
        udata.tasks[index].completed = true;
    }
}


function udata_add_gold(value) {
    udata.gold += value;
}

function udata_add_exp(value) {
    udata.exp += value;
}

function udata_reset_dailies() {
    for(var i=0; i<udata.tasks.length; i++){
        if(udata.tasks[i].type == "dailies") {
            udata.tasks[i].completed = false;
        }
    }
    udata_post();
}

function udata_create_todo_from_form(name, reward) {
    udata_add_task(name, "todo", reward);
}

function udata_create_dailies_from_form(name, reward) {
    udata_add_task(name, "dailies", reward);
}
