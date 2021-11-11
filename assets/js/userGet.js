   // AJAX
   $.ajax({
       url: './resources/users.json',
       type: 'GET',
       dataType: 'json',
       success: function userGet(data) {
           let userName = data.users[0].name;
           let pass = data.users[0].password;

           let validation = {
               userName: userName,
               pass: pass
           };
           return validation;
       }
   })