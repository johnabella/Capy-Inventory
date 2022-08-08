$('.set').click(function(){
    $tr = $(this).closest('tr');

    $data = $tr.children('td').map(function(){
        return $(this).text();
    }).get();

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

    console.log($data);

    // organize->change to class 

    $('#editItem #item').val($data[0]);
    $('#editItem #brand').val($data[2]);
    $('#editItem #unit').val($data[3]);
    $('#editItem #serial').val($data[4]);
    $('#editItem #purchaseDate').val($data[5]);
    $('#editItem #set').val($data[1]);
    $('#editItem #set').text($data[6]);

    $('#deleteItem #item').val($data[0]);
    $('#deleteItem #brand').val($data[1]);
    $('#deleteItem #unit').val($data[2]);
    $('#deleteItem #serial').val($data[3]);
    $('#deleteItem #purchaseDate').val($data[4]);
    $('#deleteItem #set').val($data[5]);
    
    $('#deleteItem #delete').attr('href','lib/delete.php?item='+ $data[0]);
}); 

$('.employee').click(function(){
    $tr = $(this).closest('tr');

    $data = $tr.children('td').map(function(){
        return $(this).text();
    }).get();
    
    console.log($data);

    $('#editEmployee #employee').val($data[0]);
    $('#editEmployee #set').val($data[1]);
    $('#editEmployee #firstname').val($data[2]);
    $('#editEmployee #lastname').val($data[3]);
    $('#editEmployee #set').text($data[4]);

    $('#deleteEmployee #employee').val($data[0]);
    $('#deleteEmployee #firstname').val($data[1]);
    $('#deleteEmployee #lastname').val($data[2]);
    $('#deleteEmployee #set').val($data[3]);

    $('#deleteEmployee #delete').attr('href','lib/delete.php?employee='+ $data[0]);
});

$('.sidebar-item a').each(function(){
    if($(location).attr('pathname').includes($(this).attr('href'))){
        $(this).parent().addClass("active");
    } else if($(location).attr('pathname') == '/InventoryHR/'){
        $('.sidebar-item a[href="index.php"]').parent().addClass("active");
    }
});