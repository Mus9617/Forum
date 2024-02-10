 
        document.getElementById("messageForm").addEventListener("submit", function(event) {
      
            document.getElementById("submitButton").disabled = true;
        
            alert("Su publicación será verificada por un administrador.");
           
            setTimeout(function() {
                window.location.href = "blog.php";
            }, 1000)
          
            event.preventDefault();
        });