$('.set').click(function(){
    $tr = $(this).closest('tr');

    $data = $tr.children('td').map(function(){
        return $(this).text();
    }).get();

    console.log($data);

    $('.modal #set').html($data[1]);
    $('#deleteSet #delete').attr('href','lib/delete.php?set='+ $data[0]);

    $('#editSet #setID').val($data[0]);
    $('#editSet #set').val($data[1]);
    $('#editSet #assignee').html($data[2]);
    $('#editSet #assignee').val($data[3]);
    $('#editSet #empID').val($data[3]);
    
    if($data[2] == "None"){
        $('#editSet #assignee').val(0);
        $('#editSet #empID').val(0);
    }
});

$('.item').click(function(){
    $tr = $(this).closest('tr');

    $data = $tr.children('td').map(function(){
        return $(this).text();
    }).get();

    // organize->change to class 

    $('#item').val($data[0]);
    $('#brand').val($data[1]);
    $('#unit').val($data[2]);
    $('#serial').val($data[3]);
    $('#purchaseDate').val($data[4]);
    $('#set').text($data[5]);

    $('#deleteItem #item').val($data[0]);
    $('#deleteItem #brand').val($data[1]);
    $('#deleteItem #unit').val($data[2]);
    $('#deleteItem #serial').val($data[3]);
    $('#deleteItem #purchaseDate').val($data[4]);
    $('#deleteItem #set').val($data[5]);
    
    $('#deleteItem #delete').attr('href','lib/delete.php?item='+ $data[0]);
}); 