$(function(){

    const MessageToast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 10000
      });


    $(".delete").each((index,btn)=>{
    
      //console.log(btn);
        $(btn).on("click",function(ev){
        let $column = $(this).attr("data-column");
        let $id = $(this).attr("data-id");
        let $table = $(this).attr("data-table");



        $("#deleteBtn").on("click",ev=>{

        // Toast.fire({
        //     type: 'info',
        //     title: "Please wait..."
        // });


        $.ajax({
          url:"delete/"+$table+"/"+$column+"/"+$id,
        }).done(function(response){
    
          if(response){
            if(response.message==="success"){
              window.location.reload();
            }
          }
          
        });
    });
    
    });
    
    
        });
    
});



// id="newMarkValue"
//id="submitMarkEdit"


$(function(){

  $edits = $(".edit");
  console.log($edits)
  $edits.each((index,editBtn)=>{
    $(editBtn).on("click",ev=>{
     // ev.stopImmediatePropagation();
      console.log(ev.target)
      let mark_id = $(ev.target).attr("data-id");
      let mark_value = $(ev.target).attr("data-value");

      console.log(mark_id);
      console.log(mark_value);
      $("#newMarkValue").val(mark_value);
      $("#submitMarkEdit").val(mark_id);
    
    });
  });

});