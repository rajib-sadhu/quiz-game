



        function myFunction(){

            var correct_way = /^[A-Za-z]+$/;     //for regular expresion variable
            var user = document.getElementById("userId").value;     //for user name condition variable
            var email = document.getElementById("emailId").value;     //for email variable
            var num = document.getElementById("numId").value; //validation of number
            var p1 = document.getElementById("password1").value;     //for First Password condition variable
        
    //User Name Validation


                //For only alphabet
                if (user.match(correct_way))
                {
                    true;
                }

                //For Not allow numbers and specials characters
                else
                {
                    document.getElementById("uMmessage").innerHTML="* Only Alphabet are allowed";
                    return false;
                }



     //Email Validation

            //wrong position '@' in the Email box
            if (email.indexOf('@')<=0) //indexOf is string
            {
                document.getElementById("eMessage").innerHTML="* Invalid '@' position";
                return false;
            }



            //wrong position '.' in the Email box
            if ((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')) //charAt is string
            {
                document.getElementById("eMessage").innerHTML="* Invalid '.' positions";
                return false;
            }



    //number validation



                if (isNaN(num)) //indexOf is string
            {
                document.getElementById("numMessage").innerHTML="* Only numbers is allowed";
                return false;
            }

            


            // greater then 0 but less then equal 10 Box
            if ((num.length !=10) && (num.length >0))
            {
                document.getElementById("numMessage").innerHTML="* Mobile number must be 10 digits";
                return false;
            }


            if ((num.charAt(0)!=9) && (num.charAt(0)!=8) && (num.charAt(0)!=7) && (num.charAt(0)!=6))
            {
                document.getElementById("numMessage").innerHTML="* Invalid Number";
                return false;
            }





        //Password Validation

            

            //Passwords must be 5 letters
            if (p1.length <5)
            {
                document.getElementById("pMessage1").innerHTML="* Password length must be 5 characters";
                return false;
            }



            //Password must be less then 16 letters
            if (p1.length >16)
            {
                document.getElementById("pMessage1").innerHTML="* Password must be less then 16 characters";
                return false;
            }



        }
        

