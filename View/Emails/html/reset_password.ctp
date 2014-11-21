<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title>MoDACA Email</title>   
</head>
<body>
    
       <div class="email-background" style="background: #ECE9E9;font-family: 'Helvetica', sans-serif;padding: 20px 10px;min-width: 300px;">
        <div class="email-container" style="padding: 10px 0px;max-width: 600px;width: 100%;margin: 0 auto;">
            <div class="email-header" style="background: #0b5a93;padding: 10px 40px;border-top-left-radius: 10px;border-top-right-radius: 10px;text-align: left;">
                <h1 style="color: white;">MoDACA</h1>
            </div>

            <div class="email-content" style="padding: 20px;background: white;font-family: sans-serif;min-height: 400px;text-align: center;">
                <h2><?php echo $title; ?>, Your New Password is Here.</h2>
                <hr style="border-top: none;border-bottom: 1px solid rgba(0, 0, 0, 0.2);margin-top: -10px;">
                <p><span class="highlight" style="font-weight: bolder;font-style: italic;">Great News</span>, We have successfully reset your account and created a password for you to access your account.
                Please use the generated password shown below to login to your account.</p>

                <br>
                <h2>New Login Details</h2>
                <hr style="border-top: none;border-bottom: 1px solid rgba(0, 0, 0, 0.2);margin-top: -10px;">                
                <p class="detail-field" style="margin-bottom: -10px;font-style: italic;">Username : <span class="details" style="font-weight: bolder;font-style: normal;"><?php echo $username; ?></span></p>
                <p class="detail-field" style="margin-bottom: -10px;font-style: italic;">New Password : <span class="details" style="font-weight: bolder;font-style: normal;"><?php echo $password; ?></span></p>
                
                <br>
                <p>Use the provided password to login to the system. As soon as you login go to your profile 
                and change the generated account password to a password of your choice.</p>
            </div>

            <div class="email-footer" style="background: #333;color: white;padding: 20px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
                <div class="footer-content-left" style="text-align: left;float: left;clear: both;">
                    <p class="footer-heading" style="font-weight: bold;font-size: 0.9em;">MoDACA | Health Promotion Management System</p>
                        <p class="footer-subheading" style="font-size: 0.7em;margin-top: -10px;">Copyright © 2014. All Rights Received.</p>
                    </div>
                    <div class="footer-content-right" style="text-align: right;">
                        <p class="footer-heading" style="font-size: 0.9em;">Developed By</p>
                        <p class="footer-subheading" style="font-weight: bold;font-size: 0.9em;margin-top: -10px;">Team InnovEx</p>
                    </div>
            </div>
        </div>
    </div>

</body>
</html>