$(function() {
  get_todo();

  $("#addTextToDo").click(function(e){
    if($("#textToDo").val().length > 0){
      $.ajax({
        type: "POST",
        url: $("#base_url").val() + "api/post/"+$("#token").val()+"/"+$("#user_id").val(),
        data:{text_todo: $("#textToDo").val()} ,
      }).done(function(data) {
          get_todo();
      })
    }else{
      console.log("nu ai intordus nimc.");
    }
  });

});


function delete_todo(id){
  $.ajax({
    type: "POST",
    url: $("#base_url").val() + "api/delete/"+$("#token").val()+"/"+$("#user_id").val(),
    data:{text_todo_id: id} ,
  }).done(function(data) {
      get_todo();
  })
}

function edit_todo(id, text_todo){
    if(text_todo.length > 0 ){
      $.ajax({
        type: "POST",
        url: $("#base_url").val() + "api/update/"+$("#token").val()+"/"+$("#user_id").val(),
        data:{text_todo_id: id, text_todo: text_todo} ,
      }).done(function(data) {
          get_todo();
      })
    }else{
      get_todo();
      console.log("trimiti un camp gol");
    }
}

function done_todo(id, is_done){
      $.ajax({
        type: "POST",
        url: $("#base_url").val() + "api/update/"+$("#token").val()+"/"+$("#user_id").val(),
        data:{text_todo_id: id, is_done: is_done}
      }).done(function(data) {
          get_todo();
      });
}

function get_todo(){
  $.ajax({
  url: $("#base_url").val() + "api/"+$("#token").val()+"/"+$("#user_id").val(),
  dataType: "json"
}).done(function(data) {
  $("#toDoContent").html("");
   for(i = 0; i < data.length; i++){

    $("#toDoContent").append('<div>  <label class="labels"><input class="label__checkbox" type="checkbox" /><span class="label__text"><span class="label__check"><i class="fa fa-check icon"></i></span></span></label>'+
     										'<span class="editToDo"> <input class="inputToDo" id= '+ data[i].id+ ' value="'+ data[i].text_todo+'" disabled />'+
     										'</span><span class="icon has-text-success is-pulled-right">'+
     									  	'<i class="fa fa-ban deleteTextToDo" todo_id="'+data[i].id+'"></i>'+
     										'</span></div><br/>');
   }
  })
  .fail(function() {

  }).always(function() {
        $(".deleteTextToDo").click(function(){
        delete_todo($(this).attr("todo_id"));
      });
        $(".editToDo").click(function(){
          $(this).find("input").attr("disabled", false);
        });
        $(".editToDo").focusout(function(){
          $(this).find("input").attr("disabled", true);
          edit_todo($(this).find("input").attr("id"), $(this).find("input").val());
        });
        $(".editToDo").find("input").keypress(function(e){
          if (e.keyCode == 13){
            $(this).find("input").attr("disabled", true);
            edit_todo($(this).attr("id"), $(this).val());
          }
        });
        $(".labels").click(function(){
            if($(this).find("input").attr("checked")){
				          $(this).find("input").attr("checked", true);
                  done_todo($(".labels").next("span").find("input").attr("id"), 1);
			     }else{
				         $(this).find("input").attr("checked", false);
                done_todo($(".labels").next("span").find("input").attr("id"),0);
            }
        });
  });
}
