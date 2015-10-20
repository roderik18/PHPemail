<?php
// Preparation
require_once('./vendor/autoload.php');
use Postmark\Models\PostmarkAttachment;
use Postmark\PostmarkClient;

//function sendBatchOfEmails(){
    $attachment = PostmarkAttachment::fromFile
                      (dirname(__FILE__). '/test.jpg', 'attachment-file-name.jpg', image/jpg);
    
    //$TussenArray = $_POST;
    //$message = $_POST;
    $message = array(
        //'To' => filter_input(INPUT_POST, 'To'),
        //'From' => filter_input(INPUT_POST, 'From'),
        //'Cc' => filter_input(INPUT_POST, 'Cc'),
        //'Bcc' => filter_input(INPUT_POST, 'Bcc'),
        //'Subject' => filter_input(INPUT_POST, 'Subject'),
        //'TextBody' => filter_input(INPUT_POST, 'TextBody')
        'To' => "roderikmasure@gmail.com",
        'From' => "roderik@masure.org",
        'Cc' => "mistermorgoth666@gmail.com",
        'Subject' => "Test",
        'TextBody' => "Dit is een testmail, ik hoop dat het nu eindelijk werkt.",
        'Attachments' => $attachment
    );

    $client = new PostmarkClient("f92ee11a-3de9-48ff-801e-1b6efc9afcdf");

    $sendResult = $client->sendEmailBatch($message);
    
    // Did it send successfully?
if( $sendResult != null ) {
    echo 'The email was sent!';
} else {
    echo 'The email could not be sent!';
}
//}
