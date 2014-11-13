<?php
    //create short variable names
    $name=$_POST['name'];
    $email=$_POST['email'];
    $feedback=$_POST['feedback'];

    $subject = 'Feedback from web site';
    $mailcontent = 'Customer name:'.$name."\n"
                   .'Customer email:'.$email."\n"
                   ."Customer comments:\n".$feedback."\n";
    $fromaddress = 'From: webserver@example.com';
    $feedback = addslashes($feedback);
    $email_array = explode ('@', $email);
    $toaddress = 'yuan@gmail.com';  
        
    if (stristr($feedback, 'shop'))
            $toaddress = 'retail@example.com';
    else if (stristr($feedback, 'delivery'))
            $toaddress = 'delivery@example.com';
    else if (stristr($feedback, ' bill'))
        $toaddress = 'account@example.com';
    
    
?>
<html>
    <head>
        <title>Y & H Life Style</title>
    </head>
    <body>
        <?php
        function spamcheck($field)
            {
            //filter_var() sanitizes the e-mail 
            //address using FILTER_SANITIZE_EMAIL
            $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  
            //filter_var() validates the e-mail
            //address using FILTER_VALIDATE_EMAIL
            if(filter_var($field, FILTER_VALIDATE_EMAIL))
                {
                return TRUE;
                }
            else
                {
                return FALSE;
                }
            }
        if (isset($_REQUEST['email']))
            {
                //check if the email address is invalid
                $mailcheck = spamcheck($_REQUEST['email']);
                if ($mailcheck==FALSE)
                    {
                        echo "Invalid input";
                    }
                else
                   {
                    mail($toaddress, $subject, $mailcontent, $fromaddress);
                    echo
                        "<p>Thank you very much
                        <br/>
                        Your feedback (shown below) has been sent.
                        <br/>
                        </p>";
                    echo nl2br ($feedback);
                   }
            }
         else
        //if "email" is not filled out, display the form. it is not working?
            {
                echo "<form method='post' action='processfeedback.php'>
                Email: <input name='email' type='text' /><br />
                Subject: <input name='subject' type='text' /><br />
                Message:<br />
                <textarea name='message' rows='15' cols='40'>
                </textarea><br />
                <input type='submit' />
                </form>";
            }
        $address = 'username@example.com';
        $arr = split ('\.|@', $address);
        while (list ($key, $value) =each ($arr))
            echo '<br/>'.$value;
            echo '<br/>';
        $token1 = strtok($feedback, 'and');
        echo $token1.'<br/>';
        $token2 = strtok('and');
        echo $token2.'<br/>';
        $str = "abcxxxx\x0abc";
        echo strlen($str);
        ?>
    </body>
</html>
