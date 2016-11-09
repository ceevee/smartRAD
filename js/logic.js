  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  format: 'dd/mm/yyyy',
	  yearRange: '-70y:+mm'

    });
	    $( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
		$( "#datepicker" ).datepicker( "option", "maxDate", "-18y" );
  } );



  $(function(){    
    $("#panel1_next").on("click", function(){	
	$(".help-block").hide();

		if(((/\d/).test($("input[name=customerName]").val()))||(!$("input[name=customerName]").val())||((/[!@#$%^&*()_+\-=\[\]{};':"\\|,<>\/?]/).test($("input[name=customerName]").val()))){
			$("#namevalid").show();
			//$("#customerName").focus();
		}else if((!$("input[name=customerAddress]").val())||((/[!@$%^&*()_+\-=\[\]{};':"|<>\?]/).test($("input[name=customerAddress]").val()))){
			$("#addressvalid").show();
			
		}else if(!((((/[0-9]{12}/).test($("input[name=nicNo]").val())==true)&&($("input[name=nicNo]").val().length==12))||(((/[0-9]{9}[vV]{1}/).test($("input[name=nicNo]").val())==true)&&($("input[name=nicNo]").val().length==10)))){		
			$("#nicvalid").show();
			//alert((/[0-9]{9}[vV]{1}/).test($("input[name=nicNo]").val()));
			
		}else if(((/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/).test($("input[name=dob]").val())==false)||($("input[name=dob]").val().length!=10)){
			$("#dobvalid").show();
		}else if(((/[0-9]{10}/).test($("input[name=contactNo]").val())==false)||($("input[name=contactNo]").val().length!=10)){
			$("#phonevalid").show();
		}else if(((/[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)+/).test($("input[name=emailAddress]").val())==false)||(!$("input[name=emailAddress]").val())){
			$("#emailnvalid").show();
		}
		else{
			
			$("#panel1").hide();
			$("#panel2").show();

		}
        return false;
    });
});

  $(function(){    
    $("#panel2_next").on("click", function(){	
	$(".help-block").hide();
		if(((/\D/).test($("input[name=salaryAmount]").val())==true)||(($("input[name=salaryAmount]").val())==false)){
			$("#amountvalid").show();
		}else if(((/\D/).test($("input[name=expPeriod]").val())==true)||(($("input[name=expPeriod]").val())==false)){
			$("#periodvalid").show();
		}
		else{
			return true;
		}
        return false;
    });
});





  $(function(){    
    $("#panel1_back").on("click", function(){	
		window.location = 'index.html';
                return false;
                //window.history.back();
        
    });
});

  $(function(){    
    $("#panel2_back").on("click", function(){	
			$("#panel2").hide();
			$("#panel1").show();
                        return false;
        
    });
});





 $(function(){ $('#LoanApplication').on('keydown', 'input', function (event) {
    if (event.which == 13) {
        event.preventDefault();
        var $this = $(event.target);
        var index = parseFloat($this.attr('data-index'));
        $('[data-index="' + (index + 1).toString() + '"]').focus();
    }
});
});



