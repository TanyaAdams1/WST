$(function(){
  $("#fail").hide();
});
$("#reset").click(function(event){
  if(!window.confirm("You're going to reset!")){
    event.preventDefault();
  }
    $("#fail").hide("fast");
});
$("#form").submit(function(event){
  $("#fail").hide("fast");
  if(!$(".required").val()||!
  ($("#Radio1").prop("checked")||$("#Radio2").prop("checked")||$("#Radio3").prop("checked"))){
    $("#fail").html("Please fill out <strong>ALL</strong> the form!");
    $("#fail").show("slow");
    event.preventDefault();
    return;
  }
  if($("#Age").val()<0){
    $("#fail").html("Invalid age!");
    $("#fail").show("slow");
    event.preventDefault();
    return;
  }
});
