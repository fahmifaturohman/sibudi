<!-- jQuery -->
<script src='../../jquery-3.0.0.js' type='text/javascript'></script>

<!-- jSignature -->
<script src="../../libs/jSignature.min.js"></script>
<script src="../../libs/modernizr.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="libs/flashcanvas.js"></script>
<![endif]-->

<!-- jSignature -->
<style>
#signature{
width: 100%;
height: auto;
border: 1px solid black;
}
</style>

<!-- Signature area -->
<div id="signature"></div><br/>
 
<input type='button' id='click' value='click'>
<textarea id='output'></textarea><br/>

<!-- Preview image -->
<img src='' id='sign_prev' style='display: none;' />

<!-- Script -->
<script>
$(document).ready(function() {

 // Initialize jSignature
 var $sigdiv = $("#signature").jSignature({'UndoButton':true});

 $('#click').click(function(){
  // Get response of type image
  var data = $sigdiv.jSignature('getData', 'image');

  // Storing in textarea
  $('#output').val(data);

  // Alter image source 
  $('#sign_prev').attr('src',"data:"+data);
  $('#sign_prev').show();
 });
});
</script>