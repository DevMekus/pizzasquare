<?php

include('connection.php');

//Send Mail Function
function sendMail($fullname, $email, $subject, $message)
{
    $html = "<html lang=\"en\">
    
    <head>
        <meta charset=\"UTF-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css\" >
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"></script>
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css\" />
        <script src=\"https://use.fontawesome.com/4138dd15b3.js\"></script>
        <title>PizzaSquare</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@900&display=swap');
        h1,
        h2,
        h3,
        h4,
        h5,
        table thead th{
        font-family: 'Montserrat', sans-serif;
        }

        p,
        a,
        label,
        table tbody td  {
            font-family: 'Roboto', sans-serif;
        }
        .banner {
            width: 200px;
            height: auto;
            position: relative;
        }

        .banner img {
            width: 100%;
        }

        p {
            text-align: justify;
        }
        
        .summary-invoice{
            display: flex;
            justify-content: flex-end;
            width: 100%;
        }
        
        .summary-inner{
            width: 300px;
            position: relative;
            padding: 10px;
        
        }
        
        .summary-inner .item{
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
    
        @media only screen and (max-width: 762px) {
            .banner {
                width: 100%;
                position: relative;
                display: flex;
                flex-wrap: wrap;
                flex-direction: column;
            }

            .banner img {
                width: 100%;
            }

            p {
                text-align: justify;
            }
        }
        </style>
    </head>
    
    <body style=\"background-color: #f0f5f5; padding:10px\">
        <div style=\"width:90%; margin:auto; border:1px solid #d1e0e0; background-color: #ffffff;\">
            <div class=\"logo\" style=\"background-color: #d1e0e0;\">
                <img src=\"https://pizzasquare.ng/assets/images/brand/logo.png\" alt=\"logo\" width=\"150\" style=\"margin-left:10px\" alt=\"pizzasquare_logo\" />
            </div>
            <div style=\"padding:20px\">
                <div class=\"banner\">
                    <img src=\"https://pizzasquare.ng/assets/images/brand/hero3.jpg\" alt=\"image\" style=\"margin-left:10px\" width=\"250\" alt=\"pizzasquare_logo\" />                   
                </div>
                <h3 style=\"font-family:Montserrat, sans-serif; font-weight:700;\">Hello " . $fullname . ",</h3>
                
                <h4 style=\"font-family:Montserrat, sans-serif; font-weight:700; color:#00A859\">" . $subject . "</h4>
                <p style=\"font-family: Roboto, sans-serif; font-size: 16px;\"> " . $message . "</p>

                <p style=\" font-size: 16px; font-family:Roboto, sans-serif;\">
                    Please do not hesitate to contact us, should you have any questions. We are ever ready to assist and answer your query.
                </p>
    
                <p style=\"color: green; font-size: 16px; font-family:Roboto,sans-serif;\">
                    Thank You,<br>
                    \" PizzaSquare \" Team.
                </p>
            </div>
    
        </div>
    
    </body>
    <script src=\"https://code.jquery.com/jquery-3.6.0.min.js\"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src=\"https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js\"></script>
    
    </html>";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers  .= "From: Pizzasquare <info@pizzasquare.ng>\n";
    $headers .= "X-Sender: Pizzasquare<info@pizzasquare.ng>\n";
    $resp = mail($email, $subject, $html, $headers);

    return $resp;
}
