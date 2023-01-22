<script type="text/javascript">

$("#idpaket").on("change", function(){

  var lama = $("#idpaket option:selected").attr("lama");
  
  $("#tarif").val(lama);
  
});
</script>