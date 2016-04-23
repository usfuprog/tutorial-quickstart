var wrapper = $("#user-register");

(function()
 {
     
     $(wrapper).find("input[value=Save]").on("click", function()
     {         //id wrapper, field, type
         
         var obj = new validForm("#user-register");
         
         var name = $(wrapper).find("[for=name] + input");
         name.removeClass( "ui-state-error" );
         var valid = true;
         valid = valid && obj.checkLength(name, "name", 3, 80);
         
         var surname = $(wrapper).find("[for=surname] + input");
         surname.removeClass( "ui-state-error" );
         valid = valid && obj.checkLength(surname, "surname", 3, 80);
         
         var email = $(wrapper).find("input[type=email]");
         email.removeClass( "ui-state-error" );
         valid = valid && obj.checkEmail(email);
         valid = valid && obj.checkLength(email, "e-mail", 1, 80);

         var pass = $(wrapper).find("input[type=password]");
         pass.removeClass( "ui-state-error" );
         valid = valid && obj.checkLength(pass, "password", 3, 16);
         
         if (valid)
             $(wrapper).find("button[type=submit]").click();
         
//         function Animal(name) {
//	  arguments.callee.count = ++arguments.callee.count || 1;
//	  this.name = name;
//	};
//	Animal.showCount = function() {
//	  alert( Animal.count );
//	};
//	var mouse = new Animal("Mouse");
//	var elephant = new Animal("elephant");
//	Animal.showCount();  // 2
     });
 })();
 
 (function()
 {
     $(wrapper).find("button[type=reset]").on("click", function()
     {
         $.map($(wrapper).find("form .form-group input"), function(elem, i)
         {
             elem.setAttribute("value", "");
             $(elem).removeClass( "ui-state-error" );
         });
         $(wrapper).find(".validateTips").text("All form fields are required.");
     });
 })();
 
 (function()
 {
     $(wrapper).find("button[type=cancel]").on("click", function(){
//         alert($(wrapper).find("input[name=password]").val());
         $(wrapper).find("button[type=reset]").click();//daze nesmotrja na eto google predlagaet savit password
         $(wrapper).find("#form-set").attr("action", "/");
     });
 })();