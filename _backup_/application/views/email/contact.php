<!DOCTYPE html>
<html>
    <head>
        <title>CodeIgniter Send Email</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h3>Use the form below to send email</h3>
            <form method="post" action="<?php echo base_url('EmailController/send'); ?>" enctype="multipart/form-data">
                <input type="email" id="to" name="to" placeholder="Receiver Email" value="asita.kumar@uneecops.com" autocomplete="off">
                <br><br>
                <input type="text" id="subject" name="subject" placeholder="Subject" value="Test" autocomplete="off">
                <br><br>
                <textarea rows="6" id="message" name="message" placeholder="Type your message here" autocomplete="off" autocomplete="nope">Sample Message</textarea>
                <br><br>
                <input type="submit" value="Send Email" />
            </form>
        </div>
    </body>
</html>