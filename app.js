$(function()  {

    console.log('jQuery is working');
    fechtComments();
 
    $('#comment-form').submit(function (e) {
         const postData = {
           name: $('#name').val(),
           description: $('#description').val(),
         };
        $.post('comment-add.php', postData, function (response)  {
            fechtComments();
 
            $('#comment-form').trigger('reset');
        });
        e.preventDefault();
 
        
   });
    
   function fechtComments (){
    
         $.ajax({
         url: 'comment-list.php',
         type: 'GET',
         success: function (response) {
             
             let comments = JSON.parse(response); 
             let template =  '<ol id="lista2">';
            
             
             comments.forEach( comment => {
                
                 template +=  `
                 
                  <li>
                        <span class="comments-name">${comment.name} </span>
                        <span> At  (${comment.date}) Said: </span>
                        <br />
                        <br />
                        <span class="comments-body" > "${comment.description}"</span>
                        <br />
                        <br />
                  </li>
                         
                     `             
             });

            template += '</ol>';
            $('#comments').html(template);
         }
     
 
   })
   }
   
 });
 