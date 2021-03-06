document.getElementById("petname").innerHTML = "Name: "+ udata.petname;
document.getElementById("petlevel").innerHTML = udata.level;
document.getElementById("gold").innerHTML = "    :"+udata.gold;
document.getElementById("exp-progress").innerHTML = udata.exp+ "%";
document.getElementById("food-progress").innerHTML = udata.food+ "%";
document.getElementById("health-progress").innerHTML = udata.health+ "%";
document.getElementById("happiness-progress").innerHTML = udata.happiness+ "%";

document.getElementById("btn-form-add-todo").addEventListener("click", function(){
    var name = document.getElementById("input-form-add-todo").value;
    var type = document.getElementById("select-form-add-task").value;
    var reward = document.getElementById("select-form-add-todo").value;//food, health, or happiness
    udata_add_task(name,type,reward);
    udata_post();
});

// document.getElementById("btn-form-add-dailies-food").addEventListener("click", function(){
//     var name = document.getElementById("input-form-add-dailies-food").value;
//     udata_create_dailies_from_form(name,"food");
//     udata_post();
// });
//
// document.getElementById("btn-form-add-dailies-health").addEventListener("click", function(){
//     var name = document.getElementById("input-form-add-dailies-health").value;
//     udata_create_dailies_from_form(name,"health");
//     udata_post();
// });
//
// document.getElementById("btn-form-add-dailies-happiness").addEventListener("click", function(){
//     var name = document.getElementById("input-form-add-dailies-happiness").value;
//     udata_create_dailies_from_form(name,"happiness");
//     udata_post();
// });

$(document).ready(function(){
    $("#exp-progress").css("width", udata.exp+ "%");
    $("#food-progress").css("width", udata.food+ "%");
    $("#health-progress").css("width", udata.health+ "%");
    $("#happiness-progress").css("width", udata.happiness+ "%");
});



/*
* Iterate through to-do list data, add listener
*/
var j=0;
for (j=0;j<udata.tasks.length;j++) {
  if(udata.tasks[j].type == "todo"){
    if(udata.tasks[j].reward =="food") {
      if(udata.tasks[j].completed ==false) {
        var list = document.getElementById('creattask');
        var taskname = " "+udata.tasks[j].name+" ";
        var newtask = document.createElement('li');
        $(newtask).addClass("list-group-item").addClass("list-group-item-warning");
        $(newtask).css({"font-size":"12pt","height":"45px","width":"360px"});
        var icon = document.createElement("span");
        icon.className = "glyphicon glyphicon-cutlery";

        var donebutton = document.createElement('BUTTON');
        donebutton.className = "btn btn-default btn-xs alignright";
        donebutton.id = "foodbtn"+j;
        var checkicon = document.createElement("span");
        checkicon.className = "glyphicon glyphicon-unchecked";
        donebutton.appendChild(checkicon);

        newtask.appendChild(icon);
        newtask.appendChild(document.createTextNode(taskname));
        newtask.appendChild(donebutton);
        list.appendChild(newtask);
        !function outer(j){
          document.getElementById("foodbtn"+j).addEventListener("click", function inner(e){
            udata_complete_task(j);
            udata_post();
          },false)
        }(j)

      }
    } else if (udata.tasks[j].reward=="health") {
      if(udata.tasks[j].completed==false) {
        var list = document.getElementById('creattask');
        var taskname = " "+udata.tasks[j].name+" ";
        var newtask = document.createElement('li');
        $(newtask).addClass("list-group-item").addClass("list-group-item-warning");
        $(newtask).css({"font-size":"12pt","height":"45px","width":"360px"});
        var icon = document.createElement("span");
        icon.className = "glyphicon glyphicon-plus-sign";

        var donebutton = document.createElement('BUTTON');
        donebutton.className = "btn btn-default btn-xs alignright";
        var checkicon = document.createElement("span");
        checkicon.className = "glyphicon glyphicon-unchecked";
        donebutton.appendChild(checkicon);
        donebutton.id = "healthbtn"+j;


        newtask.appendChild(icon);
        newtask.appendChild(document.createTextNode(taskname));
        newtask.appendChild(donebutton);
        list.appendChild(newtask);
        !function outer(j){
          document.getElementById("healthbtn"+j).addEventListener("click", function inner(e){
              udata_complete_task(j);
              udata_post();
          },false)
        }(j)

      }

    } else if (udata.tasks[j].reward==="happiness") {
      if(udata.tasks[j].completed===false) {
        var list = document.getElementById('creattask');
        var taskname = " "+udata.tasks[j].name+" ";
        var newtask = document.createElement('li');
        $(newtask).addClass("list-group-item").addClass("list-group-item-warning");
        $(newtask).css({"font-size":"12pt","height":"45px","width":"360px"});
        var icon = document.createElement("span");
        icon.className = "glyphicon glyphicon-heart-empty";

        var donebutton = document.createElement('BUTTON');
        donebutton.className = "btn btn-default btn-xs alignright";
        var checkicon = document.createElement("span");
        checkicon.className = "glyphicon glyphicon-unchecked";
        donebutton.appendChild(checkicon);
        donebutton.id = "happinessbtn"+j;

        newtask.appendChild(icon);
        newtask.appendChild(document.createTextNode(taskname));
        newtask.appendChild(donebutton);
        list.appendChild(newtask);
        !function outer(j){
          document.getElementById("happinessbtn"+j).addEventListener("click", function inner(e){
              udata_complete_task(j);
              udata_post();
          },false)
        }(j)


      }

    }
  }
}

/*
* Iterate through dailies list data, add listener
*/
var m=0;
for (m=0;m<udata.tasks.length;m++) {
    if(udata.tasks[m].type == "dailies"){
        if(udata.tasks[m].reward == "food"){
            if(udata.tasks[m].completed == false){
                  var list = document.getElementById('try1');
                  var taskname= udata.tasks[m].name+" ";
                  var newtask=document.createElement('li');
                  $(newtask).addClass("list-group-item").addClass("list-group-item-warning");
                  $(newtask).css({"font-size":"10pt","height":"35px","width":"360px"});
                  var donebutton = document.createElement('BUTTON');
                  donebutton.className = "btn btn-default btn-xs alignright";
                  var checkicon = document.createElement("span");
                  checkicon.className = "glyphicon glyphicon-unchecked";
                  donebutton.appendChild(checkicon);
                  newtask.appendChild(document.createTextNode(taskname));
                  newtask.appendChild(donebutton);
                  list.appendChild(newtask);
                  donebutton.id = "fooddonebtn"+m;
                  !function outer(m){
                    document.getElementById("fooddonebtn"+m).addEventListener("click", function inner(e){
                        udata_complete_task(m);
                        udata_post();
                    },false)
                  }(m)
            } else if(udata.tasks[m].completed === true){
                var list = document.getElementById('try1');
                var taskname= udata.tasks[m].name;
                var newtask=document.createElement('li');
                $(newtask).addClass("list-group-item").addClass("list-group-item-warning")
                $(newtask).css({"font-size":"10pt","background-color":"#E3E3E3","height":"35px","width":"360px"})
                newtask.appendChild(document.createTextNode(taskname));
                list.appendChild(newtask);
            }
        }
    }
}

var n=0;
for (n=0;n<udata.tasks.length;n++) {
  if(udata.tasks[n].type == "dailies"){
    if(udata.tasks[n].reward == "health"){
       if(udata.tasks[n].completed == false){
      var list = document.getElementById('try2');
      var taskname= udata.tasks[n].name+" ";
      var newtask=document.createElement('li');
      $(newtask).addClass("list-group-item").addClass("list-group-item-warning")
      $(newtask).css({"font-size":"10pt","height":"35px","width":"360px"})
      var donebutton = document.createElement('BUTTON');
      donebutton.className = "btn btn-default btn-xs alignright";

      var checkicon = document.createElement("span");
      checkicon.className = "glyphicon glyphicon-unchecked";
      donebutton.appendChild(checkicon);
      newtask.appendChild(document.createTextNode(taskname));
      newtask.appendChild(donebutton);
      list.appendChild(newtask);
      donebutton.id = "healthdonebtn"+n;
      !function outer(n){
        document.getElementById("healthdonebtn"+n).addEventListener("click", function inner(e){
            udata_complete_task(n);
            udata_post();
        },false)
      }(n)
    }

      else if(udata.tasks[n].completed == true){
        var list = document.getElementById('try2');
      var taskname= udata.tasks[n].name;
      var newtask=document.createElement('li');
      $(newtask).addClass("list-group-item").addClass("list-group-item-warning")
      $(newtask).css({"font-size":"10pt","background-color":"#E3E3E3","height":"35px","width":"360px"})
      newtask.appendChild(document.createTextNode(taskname));
      list.appendChild(newtask);
    }
    }
 }
}


var k=0;
for (k=0;k<udata.tasks.length;k++) {
  if(udata.tasks[k].type == "dailies"){
    if(udata.tasks[k].reward == "happiness"){
       if(udata.tasks[k].completed == false){
      var list = document.getElementById('try3');
      var taskname= udata.tasks[k].name+" ";
      var newtask=document.createElement('li');
      $(newtask).addClass("list-group-item").addClass("list-group-item-warning")
      $(newtask).css({"font-size":"10pt","height":"35px","width":"360px"})

      var donebutton = document.createElement('BUTTON');
      donebutton.className = "btn btn-default btn-xs alignright";
      var checkicon = document.createElement("span");
      checkicon.className = "glyphicon glyphicon-unchecked";
      donebutton.appendChild(checkicon);
      newtask.appendChild(document.createTextNode(taskname));
      newtask.appendChild(donebutton);
      list.appendChild(newtask);
      donebutton.id = "happinessdonebtn"+k;
      !function outer(k){
        document.getElementById("happinessdonebtn"+k).addEventListener("click", function inner(e){
            udata_complete_task(k);
            udata_post();
        },false)
      }(k)

    }

      else if(udata.tasks[k].completed === true){
        var list = document.getElementById('try3');
      var taskname= udata.tasks[k].name;
      var newtask=document.createElement('li');
      $(newtask).addClass("list-group-item").addClass("list-group-item-warning")
      $(newtask).css({"font-size":"10pt","background-color":"#E3E3E3","height":"35px","width":"360px"})
      newtask.appendChild(document.createTextNode(taskname));
      list.appendChild(newtask);
    }
    }
 }
}

/*
* Iterate through Inventory Items, add listener
*/
for (var i=0;i<udata.items.length;i++) {
  if(udata.items[i].type == "food"){
     var icon = document.createElement("span");
     icon.className = "glyphicon glyphicon-cutlery";
     var button = document.createElement('button');
     button.className = "btn btn-default btn-sm";
     button.appendChild(icon);
     button.id = "itembtn"+i;
     document.getElementById('inventory').appendChild(button);
   }

   !function outer(i){
         document.getElementById("itembtn"+ i).addEventListener("click", function inner(e){
           udata_consume_item(i);
           udata_post();
         },false)
    }(i)
 }
