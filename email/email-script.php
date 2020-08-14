<?php
if (isset($_POST['sendMailBtn'])) {
    $fromEmail = $_POST['fromEmail'];
    $toEmail = $_POST['toEmail'];
    $subjectName = $_POST['subject'];

    $to = $toEmail;
    $subject = $subjectName;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
    $message = '<!DOCTYPE html>
                <html lang="en">
                <head>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                </head>
                <body>
                <h2>Detail Problem</h2>
                <style type="text/css">
                  input, textarea { 
                    padding: 9px; 
                    border: solid 1px #E5E5E5; 
                    outline: 0; 
                    font: normal 13px/100% Verdana, Tahoma, sans-serif; 
                    width: 200px; 
                    background: #FFFFFF; 
                    } 
                   
                textarea { 
                    width: 400px; 
                    max-width: 400px; 
                    height: 150px; 
                    line-height: 150%; 
                    } 
                   
                input:hover, textarea:hover, 
                input:focus, textarea:focus { 
                    border-color: #C9C9C9; 
                    } 
                   
                .form label { 
                    margin-left: 10px; 
                    color: #999999; 
                    } 
                   
                .submit input { 
                    width: auto; 
                    padding: 9px 15px; 
                    background: #617798; 
                    border: 0; 
                    font-size: 14px; 
                    color: #FFFFFF; 
                    }
                input, textarea { 
                    box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
                    -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
                    -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
                    }
                </style>
                <form class="form"> 
                   
                    <p class="no_ticket"> 
                        <label for="no_ticket">No Ticket</label> 
                        <input style="margin-left: 12px;" type="text" name="no_ticket" id="no_ticket" /> 
                    </p> 
                   
                    <p class="tanggal"> 
                        <label for="tanggal">Tanggal</label> 
                        <input style="margin-left: 24px;" type="text" name="tanggal" id="tanggal" /> 
                    </p> 
                   
                    <p class="nama"> 
                        <label for="nama">Nama</label> 
                        <input style="margin-left: 35px;" type="text" name="nama" id="nama" value="" /> 
                    </p> 

                    <p class="section"> 
                        <label for="section">Section</label> 
                        <input style="margin-left: 26px;" type="text" name="section" id="section" value="" /> 
                    </p> 

                    <p class="service"> 
                        <label for="service">Service</label> 
                        <input style="margin-left: 27px;" type="text" name="service" id="service" value="" /> 
                    </p> 

                    <p class="item"> 
                        <label for="item">Item</label> 
                        <input style="margin-left: 43px;" type="text" name="item" id="item" value="" /> 
                    </p> 
                   
                    <p class="text">
                        <textarea name="text"></textarea> 
                    </p> 
                   
                    <p class="submit"> 
                        <input type="submit" value="Send" /> 
                    </p> 
                   
                </form>

                </body>
                </html>';
    if(mail($to, $subject, $message, $headers)){
        echo '<script>alert("Email sent successfully !")</script>';
        echo '<script>window.location.href="index.php";</script>';
    }else{
        echo '<script>alert("Email sent Failed !")</script>';
        echo '<script>window.location.href="index.php";</script>';
    }

    
}