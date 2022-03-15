$(document).ready(function () {
    $('#ckbAll').on('click', function(e) {
        $(".sub_chk").prop('checked',$(this).prop('checked'));
    });

    $('#delete_multi').on('click', function(e) {
        var allVals = [];  
        $(".sub_chk:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });  
      
        if(allVals.length <=0)  
        {  
            alert("Please select row.");  
        }  else {  
            var check = confirm("Are you sure you want to delete this row?");  
            if(check == true){  
                var join_selected_values = allVals.join(","); 
                $.ajax({
                    // url: "{{url('del_multi_prd')}}",
                    url: "{{route('del_multi_prd')}}",
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: 'ids='+join_selected_values,
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {  
                                $(this).parents("tr").remove();
                            });
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });
              $.each(allVals, function( index, value ) {
                  $('table tr').filter("[data-row-id='" + value + "']").remove();
              });
            }  
        }  
    });  
});



// $(function(e){
//     $('#delete_multi').click(function(e){
//     e.preventDefault();
//     var  allids = [];

//     $("input:checkbox[name=ids]").each(function(){
//         allids.push($(this).val());
//     });
//     $.ajax({
//         url: '/delMultiPrdType',
//         type: 'POST',
//         data:{
//             _token:$("input[nam=_token]").val(),
//             ids:allids
//         },
//         success:function(response){
//             $.each(allids,function(key,val){
//                 $("#sid" +val).remove();
//             })
//         }
//     });
//     });

// });