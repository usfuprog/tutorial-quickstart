function validForm(prefix)
{
var 
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      
      email = $( prefix + "#email" ),
      password = $( prefix + "#password" ),
      allFields = $( [] ).add( email ).add( password ),
      tips = $( prefix + " .validateTips" );
//      alert(tips.text());
    
    function updateTips( t ) {
//        alert(t);
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    this.checkLength = function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
        return false;
      } else {
        return true;
      }
    };
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
    
    this.checkEmail = function ckeckEmail(elem)
    {
        var valid = checkRegexp(elem, emailRegex, "eg. ui@jquery.com");
        return valid;
    };
    
    this.startValidation = function startValidation() {
      var valid = true;
//      alert(allFields.size());
      allFields.removeClass( "ui-state-error" );
      valid = valid && checkLength( email, "email", 1, 80 );
      valid = valid && checkLength( password, "password", 3, 16 );
      
//      valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
      valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
 
      if ( valid ) {
//        $( "#users tbody" ).append( "<tr>" +
//          "<td>" + name.val() + "</td>" +
//          "<td>" + email.val() + "</td>" +
//          "<td>" + password.val() + "</td>" +
//        "</tr>" );
        var submit = $("#dialog-form input[type=submit]");
//        var email = $("#dialog-form #email");
//        alert($("#dialog-form #email").val());
        $("#dialog-form #email").attr("value", $("#dialog-form #email").val());
        $("#dialog-form #password").attr("value", $("#dialog-form #password").val());
        submit.click();
//        alert(email);
      }
      return valid;
    }
    
};
 