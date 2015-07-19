function Debit_card()
{
	 var cardno = document.debit.Atmno.value,
	  name = document.debit.person.value,
	  month = document.debit.month.value,
	 year = document.debit.year.value,
	 cv=document.debit.cvv.value,
	 cvv_length=cv.length,
	 result=0;
	   
		 if((cardno="") || (cardno.replace((/\D/g, "").length)<14))
		 {
			  document.debit.Atmno.style.backgroundColor = "red";
                 result=1;
			 
		 }
		 
		  else if(!card(cardno))
             {
	             document.debit.Atmno.style.backgroundColor = "red";
                 result=1;
             }	 
			 
		else
            document.debit.Atmno.style.backgroundColor="lightgreen"; 			
			
		 
		 if(name == "" )
			 {
				 document.debit.person.style.backgroundColor="red"; 
				result=1;
			 }
			 
		else if(name_invalid(name))
			 {   
		           document.debit.person.style.backgroundColor="red"; 
				result=1;	
				 
			 }				 
		   else
            document.debit.person.style.backgroundColor="lightgreen";
			
		   
		   if (month == "" || year=="") 
			   {
				
				  document.debit.month.style.backgroundColor = "red";
				  document.debit.year.style.backgroundColor = "red";
				  result=1;	  
			   }
			 else if(dateinvalid(month,year))
			 {   
		          document.debit.month.style.backgroundColor = "red";
				  document.debit.year.style.backgroundColor = "red";
				  result=1;	
				 
			 }				 
			   else
			   {
				   document.debit.month.style.backgroundColor = "lightgreen";
				   document.debit.year.style.backgroundColor = "lightgreen";
			   }
				   


		  if(cv="" || (cvv_length<=2))
			  {
				   document.debit.cvv.style.backgroundColor="red";
				   result=1;  
			  }
		  else
              document.debit.cvv.style.backgroundColor="lightgreen";			  

		  if(result)
		  {
			  
			  return false;
			  
		  }
		      
		  else
		      return true;
}


function card(value) {
// accept only digits, dashes or spaces
if (/[^0-9-\s]+/.test(value)) return false;
 
var nCheck = 0, nDigit = 0, bEven = false;
value = value.replace(/\D/g, "");
 
for (var n = value.length - 1; n >= 0; n--) {
var cDigit = value.charAt(n),
nDigit = parseInt(cDigit, 10);
 
if (bEven) {
if ((nDigit *= 2) > 9) nDigit -= 9;
}
 
nCheck += nDigit;
bEven = !bEven;
}
 
return (nCheck % 10) == 0;
} 

function dateinvalid(month,year){
	if(year<=2015 && month<=4)
		return true;
	else
		return false;
}

function name_invalid(name)
{
	var valid_name=/^[A-Za-z\s]+$/;     
	if(name.match(valid_name))     // contain space + char
	   return false; 			// only spaces   left
	else
		return true;
	
}