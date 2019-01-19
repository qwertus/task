
$('#table').on('click','td',function(){
    var col = $(this).data('val');
    var factor1 = $(this).data('x');
    var factor2 = $(this).data('y');
    var operation = '*';
    var result = factor1*factor2;
    //prikaz u koloni
    $(this).html(col);
    //ajax sa parametrima 
$.ajax({
    'type': 'POST',
    'url': '/insert.php',
    data: {
        'task': 'insert',
        'factor1': factor1,
        'factor2': factor2,
        'operation': operation,
        'result': result
    }        
}).done(function(response) {
    alert(response);
    //sta treba da se desi kad vrati response
}).fail(function() {
    alert('Error!');
    //ukoliko postoji greska
});
});

