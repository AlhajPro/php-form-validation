<?php
    if (isset($_POST['send_message'])) {
        
        $full_name = error($_POST['full_name']);
        $email_address = error($_POST['email_address']);
        $subject = error($_POST['subject']);
        $message = error($_POST['message']);
        $gender = error($_POST['gender']);              
        $color = error($_POST['color']);

        
        


        $error = [];

        if (empty($full_name)) {
            $error['full_name'] = "Please insert a Name";
        }
        if (empty($email_address)) {
            $error['email_address'] = "Please insert a Email Address";
        }
        if (empty($subject)) {
            $error['subject'] = "Please insert a subject";
        }
        if (empty($message)) {
            $error['message'] = "Please insert a message";
        }
        if (empty($gender)) {
            $error['gender'] = "Please Select your gender";
        }
        if (empty($color)) {
            $error['color'] = "Please Select your Favorite Color";
        }

        if (count($error) == 0) {
            mail("alhajislam5@gmail.com","Custom PHP Form $email_address","Subject: $subject <br/> Message: $message <br/> Gender: $gender <br/> Color: $color");
        }

    }

    function error($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic PHP form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <form action="#" method="POST">`
            <p>
                <label>Name</label>
                <input type="text" name="full_name" value="<?php if(isset($full_name)){echo $full_name;}?>">
                <span>
                    <?php
                        if (isset($error['full_name'])) {
                            echo $error['full_name'];
                    }?>
                </span>
            </p>
            <p>
                <label>Email</label>
                <input type="text" name="email_address" value="<?php if(isset($email_address)){echo $email_address;}?>">
                <span>
                    <?php
                        if (isset($error['email_address'])) {
                            echo $error['email_address'];
                    }?>
                </span>
            </p>
            <p>
                <label>Subject</label>
                <input type="text" name="subject" value="<?php if(isset($subject)){echo $subject;}?>">
                <span>
                    <?php
                        if (isset($error['subject'])) {
                            echo $error['subject'];
                    }?>
                </span>
            </p>
            <p>
                <label>Message</label>
                <textarea name="message" ><?php if(isset($message)){echo $message;}?></textarea>
                <span>
                    <?php
                        if (isset($error['message'])) {
                            echo $error['message'];
                    }?>
                </span>
            </p>
            <p>
                <label>Select your gender</label>
                <input type="radio" name="gender" <?php if(isset($gender) && $gender == 'Male'){echo 'checked';}?> value="Male">Male
                <input type="radio" name="gender" <?php if(isset($gender) && $gender == 'Female'){echo 'checked';}?> value="Female">Female
                <input type="radio" name="gender" <?php if(isset($gender) && $gender == 'Other'){echo 'checked';}?> value="Other">Other
                <span>
                    <?php
                        if (isset($error['gender'])) {
                            echo $error['gender'];
                    }?>
                </span>
                
            </p>
            <p>
                <label>Select your Favorite color</label>
                <select name="color">
                    <option disabled selected value="Select your color">Select your color</option>

                    <option value="Red" <?php if(isset($color) && $color == 'Red'){echo 'selected';}?> value="Red">Red</option>

                    <option value="Green" <?php if(isset($color) && $color == 'Green'){echo 'selected';}?>>Green</option>

                    <option value="Black" <?php if(isset($color) && $color == 'Black'){echo 'selected';}?>>Black</option>

                    <option value="Yellow" <?php  if(isset($color) && $color == 'Yellow'){echo 'selected';}?>>Yellow</option>
                </select>
                <span>
                    <?php
                        if (isset($error['color'])) {
                            echo $error['color'];
                    }?>
                </span>
            </p>
            <p>
                <input type="submit" value="Send Message" name="send_message">
            </p>
        </form>
    </div>
</body>
</html>