fetch('http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=edoc&table=doctor')
        .then(response => response.json())
        .then(data => {
            // Handle the response data here
            console.log(data);
        })
        .catch(error => {
            // Handle errors here
            console.error(error);
        });
        console.log("hello!")