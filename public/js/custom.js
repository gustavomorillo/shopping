
	
  $(document).ready(function() {
  





  for(var i=1;i<20;i++) {
    console.log(i);
var b= 1;

      $('#upCart' + i).on('click', function(){
              
        var subtotal = $('#subtotal' + i).val();
        var newqty = $('#up'+ b).val();
        var rowId = $('#rowId'+ i).val();
        var proId = $('#proId'+ i).val();
        alert(newqty);

      });
  }
});
  
        
    
  //           $.ajax({
  //                 type: 'POST',
  //                 url: 'cart/'+proId,
  //                 data: {newqty:newqty,rowId:rowId,proId:proId,_method: 'PATCH'}
  //               }).done(function(item){
  //               console.log(item);
  //               getAll();
  //               });
    
  //           function getAll(){
  //             $.ajax({
  //               type: 'get',
  //               url:'cart/get/all',
  //               data: {rowId:rowId, newqty:newqty}
  //               }).done(function(item) {
  //               console.log(item);
  //               $('#subtotal' + $i).val(item['0']);
  //               $('#subtotal').val(item['1']);
  //               $('#total').val(item['2']);
                
  //               });
  //           }
  //       });
    
  //    } 
    
      // });
    
    
    //   $(document).ready(function() {
    
    // for($i=1;$i<20;$i++){
    
    
    //   $('#downCart'+ $i).on('click', function(){
              
    //     var subtotal = $('#subtotal'+ $i).val();
    //     var newqty = $('#up'+ $i).val();
    //     var rowId = $('#rowId'+ $i).val();
    //     var proId = $('#proId'+ $i).val();
    //     // alert(newqty);
        
    
    
    //     if (newqty == 0) {
    //       refresh();
    //     }
    
    //     function refresh() {
    //       myVar = setTimeout(function(){
    //         location.reload();
    //       }, 1000);
    //     }
        
        
    //         $.ajax({
    //               type: 'POST',
    //               url: 'cart/'+proId,
    //               data: {newqty:newqty,rowId:rowId,proId:proId,_method: 'PATCH'}
    //             }).done(function(item){
    //             console.log(item);
    //             getAll();
    //             });
    
    //         function getAll(){
    //           $.ajax({
    //             type: 'get',
    //             url:'cart/get/all',
    //             data: {rowId:rowId, newqty:newqty}
    //             }).done(function(item) {
    //             console.log(item);
    //             $('#subtotal'+ $i).val(item['0']);
    //             $('#subtotal').val(item['1']);
    //             $('#total').val(item['2']);
                
    //             });
    //         }
    
          
    //     });
    
    // } 
    
    //   });
          
 