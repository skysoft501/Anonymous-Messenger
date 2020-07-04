
<?php
if(isset($_POST['submit']))
{
 
$validate = '<h2>Message Sent!</h2>';
 
$message = strip_tags($_POST['message']);
$cc = strip_tags($_POST['cc']);
$bcc = strip_tags($_POST['bcc']);
$email = strip_tags($_POST['email']);
$to = strip_tags($_POST['to']);
$subject = strip_tags($_POST['subject']);
 
$attachment = chunk_split(base64_encode(file_get_contents($_FILES['file']['tmp_name'])));
$filename = $_FILES['file']['name'];
 
$boundary =md5(date('r', time())); 
 
$headers = "From: $email\r\nCc: $cc\r\nBcc: $bcc\r\n" ;

 
$headers .= "MIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";
 
$message="This is a multi-part message in MIME format.
 
--_1_$boundary
Content-Type: multipart/alternative; boundary=\"_2_$boundary\"
 
--_2_$boundary
Content-Type: text/plain; charset=\"iso-8859-1\"
Content-Transfer-Encoding: 7bit
 
$message
 
--_2_$boundary--
--_1_$boundary
Content-Type: application/octet-stream; name=\"$filename\" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment
 
$attachment
--_1_$boundary--";
 
mail($to, $subject, $message, $headers);
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
.div-2 {
    background-color: #ABBAEA;
    max-width: 550px; 
    height: 550px;
}
</style>
<title>Email Sender!</title>
<h1 style="color:blue;">Anonymous Messenger Client!</h1>
<h2> Keep Your Privacy. Send Emails & Attachments<br><b style="color:red;"> With Anonymous Adddress!</b></h2>
</head>

<body>
<?php echo $validate; ?>
<div class="div-2">
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    
<p><label for="email">Email-From: </label><input type="text" id="email" name="email">
<p><label for="to">Email-To: ---</label><input type="text" id="to" name="to">
<p><label for="cc">Cc: -----------</label><input type="text" id="cc" name="cc">
<p><label for="bcc">Bcc: ---------</label><input type="text" id="bcc" name="bcc">
<p><label for="subject">Subject: -----</label><input type="text" id="subject" name="subject">
<p><label for="message"><b>Message:</b> ---</label> <textarea name="message" id="message" cols="20" rows="8"></textarea></p>
<p><label for="file">Add Attachment: </label> <input type="file" name="file" id="file"></p>
<p><input type="submit" name="submit" id="submit" value="send"></p>
<b style="color:red;">Check out my open source projects on <a href=https://github.com/skysoft501/>Github</a>Follow me on<a href=www.twitter.com/skysoft501>Twitter</a></b>
<br>
<br>
<marquee><b>Chat with us live on our website <a href = "www.mifacode.com">www.mifacode.com</a>for your websites and web applications, ecommerce shopping websites, windows and android/iOs Apps and general software solutions
We also train young minds on the coding culture, using any programming language of your choice. Call 08162934191 </b></a></marquee>
</form>
</div>
</body>
</html>

    



















