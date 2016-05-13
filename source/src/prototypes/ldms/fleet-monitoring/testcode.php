<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#show").click(function(){
        $('p').show();
    });
    $("#hide").click(function(){
    	$('p').hide();
    });
});
</script>
</head>
<body>

<p>If you click on me, I will disappear.</p>
<p>Click me away!</p>
<p>Click me too!</p>

<button id="show">Clickkk</button>
<button id="hide">Clickkk Hide</button>

</body>
</html>
