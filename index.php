<!doctype html>
<html>
<head>
 
   <meta name="robots" content="noindex,nofollow">
   <title>AJAX Pet Starter</title>
   <script src="https://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
   <script>



       
    $("document").ready(function(){
        
        $("#pet_likes").hide();
        $("#pet_eats").hide();
        

        $("#pet_feels").click(function(e){
            //alert("I'm clicked!");
            $("#pet_likes").slideDown(200);

        });

        $("#pet_likes").click(function(e){
            //alert("I'm clicked!");
            $("#pet_eats").slideDown(200);

        });
        
        $('#myForm').submit(function(e){
            e.preventDefault();//no need to submit as you'll be doing AJAX on this page
            let feels = $("input[name=feels]:checked").val();
            let likes = $("input[name=likes]:checked").val();
            let eats = $("input[name=eats]:checked").val();
            let pet = "";

            if(feels=="fluffy" && likes=="petted" && eats=="carrots" ){
                pet = "rabbit";
            }

            if(feels=="scaly" && likes=="ridden" && eats=="pets" ){
                pet = "velociraptor";
            }

            //alert(pet);
            var output = "";//global var
            $.get('includes/get_pet.php',
            {//below the get "name" and value "this_critter" are paired for sending 
                critter:pet
            }, function(data) {    
                //alert(data);  //here's an alert if you wish to see the data upon return
                //$('#myDiv').html(data); //upon return load data into myDiv
                output += data;
            }, 'html');

            output += `<p>Your pet is a: ${pet}</p>`;
            output += `<p>Your pet feels: ${feels}</p>`;
            output += `<p>Your pet likes to be: ${likes}</p>`;
            output += `<p>Your pet likes to eat: ${eats}</p>`;
            $("#output").html(output);
        });

    });

   </script>
</head>
<body>
<h2>AJAX Pet Starter</h2>
<form id="myForm" name="myForm" action="form-handler.php" method="post">
<p>Below is a starter page for the AJAX Pet Adoption Agency assignment.</p>
   <div id="pet_feels">
       <h3>Feels</h3>
       <p>Please choose how you would like your pet to feel:</p>
       <input type="radio" name="feels" value="fluffy" required="required">fluffy <br />
       <input type="radio" name="feels" value="scaly">scaly <br />
   </div>
   <div id="pet_likes">
       <h3>Likes</h3>
       <p>Please tell us what your pet will like:</p>
       <input type="radio" name="likes" value="petted" required="required">to be petted <br />
       <input type="radio" name="likes" value="ridden">to be ridden <br />
   </div>
       <div id="pet_eats">
       <h3>Eats</h3>
       <p>Please tell us what your pet likes to eat:</p>
       <input type="radio" name="eats" value="carrots" required="required">carrots <br />
       <input type="radio" name="eats" value="pets">other people's pets <br />
   </div>
  
   <input type="submit" value="submit it!" />
   <div id="pet">Pet pic goes here</div>
   <div id="output">Output goes here!</div>
</form>
</body>
</html>
