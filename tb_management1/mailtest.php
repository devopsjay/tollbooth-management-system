<?php
if (mail('sushant.saurabh1993@gmail.com', 'Hello!', 'Hello, this is a test email', 'From: sushant.iiita@gmail.com')) {
    echo "Message successfully sent!";
} else {
    echo "Message delivery failed...";
}
?>