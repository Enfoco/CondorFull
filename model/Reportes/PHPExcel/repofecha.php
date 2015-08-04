<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery UI Datepicker - Default functionality</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">

</head>
<body>

<form action="fecha.php" method="post">
<p><label>Selecciona fecha:</label><input id="demo4" type="text" name="fechaini"></p>
<p><label>Selecciona fecha:</label><input id="demo41" type="text" name="fechafin"></p>
<br>
<button type="button" class="btn btn-primary">Destacado</button>

</form>


</body>
<script type="text/javascript">
$(function() {
    $("#demo1").datepicker();
    
    $("#demo2").datepicker({
        dateFormat: 'dd/mm/yy'
    });
    
    $("#demo3").datepicker({
        minDate: 0,
        maxDate: "+10D"
    });
    
    $("#demo4").datepicker({
        changeMonth: true, 
        changeYear: true
    });

     $("#demo41").datepicker({
        changeMonth: true, 
        changeYear: true
    });
    
    $( "#demo5" ).datepicker({
        showWeek: true,
        firstDay: 1
    });
    
    $( "#demo6" ).datepicker({
        numberOfMonths: 3
    });
    
    $( "#demo7" ).datepicker({
        showOn: "button",
        buttonImage: "css/ui-darkness/images/datepicker.jpg",
        buttonImageOnly: true
    });
    
    $("#from").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onSelect: function(selectedDate) {
            $("#to").datepicker("option", "minDate", selectedDate);
        }
    });
    
    $("#to").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onSelect: function(selectedDate) {
            $("#from").datepicker( "option", "maxDate", selectedDate);
        }
    });
    
    $('#demo8').datepicker({
        dateFormat: 'dd/mm/yy', 
        changeMonth: true, 
        changeYear: true, 
        yearRange: '0:+2',
        minDate: 0,
        onSelect: function(selectedDate) {
            alert(selectedDate);
        }

    });
    
    $('#demo9').datepicker({
        onSelect: function(selectedDate) {
            var dataString = 'date='+selectedDate;
            $.ajax({
                type: "POST",
                url: "save.php",
                data: dataString,
                success: function(data) {
                    $('#result').empty();
                    $('#result').html(data);
                }
            });
        }

    });
    
    $('#demo10').datepicker({
        dateFormat: 'dd/mm/yy', 
        dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        beforeShowDay: function (day) { 
            var day = day.getDay(); 
            if (day == 0 || day == 6) { 
                return [false, "somecssclass"] 
            } else { 
                return [true, "someothercssclass"] 
            } 
        } 

    });
});
</script>
</html>