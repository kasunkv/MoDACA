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
                <h2><?php echo $title; ?></h2>
                <hr style="border-top: none;border-bottom: 1px solid rgba(0, 0, 0, 0.2);margin-top: -10px;">
                <p><?php echo $body; ?></p>
                <p></p>
            </div>

            <div class="email-footer" style="background: #333;color: white;padding: 20px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
                <div class="footer-content-left" style="text-align: left;float: left;clear: both;">
                    <p class="footer-heading" style="font-weight: bold;font-size: 0.9em;">MoDACA | Health Promotion Management System</p>
                        <p class="footer-subheading" style="font-size: 0.7em;margin-top: -10px;">Copyright © 2014. All Rights Received.</p>
                    </div>
                    <div class="footer-content-right" style="text-align: right;">
                        <!--<img src="Logo_s.png" height="50" />-->
                        <p class="footer-heading" style="font-size: 0.7em;">Developed By</p>
                        <p class="footer-subheading" style="font-weight: bold;font-size: 0.9em;margin-top: -10px;">Team InnovEx</p>
                    </div>
            </div>
        </div>
    </div>

</body>
</html>