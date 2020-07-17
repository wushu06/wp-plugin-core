<?php
namespace HmuCore;

/**
 * Class AbstractSettings
 * @package HmuCore
 */
abstract class Helper
{
    /**
     * @param $message
     */
    public function logger($message)
    {
        $log =  date("F j, Y, g:i a") .': '.$message. PHP_EOL .
            "-------------------------" . PHP_EOL;
        $logDir = HmuCore_PATH.'/logs';
        if (!file_exists($logDir)) {
            mkdir($logDir, 0755, true);
        }
        file_put_contents($logDir.  '/log_' . date("j.n.Y") . '.log', $log, FILE_APPEND);
    }

    /**
     * @param $msg
     * @param string $subject
     * @param string $attachment
     */
    public function sendEmail($msg, $subject = 'Tbb notifications', $attachment = '')
    {
//        $option = new \HmuCore\Block\Main();
//        if(!$option->emailEnable){
//            return;
//        }
//        $headers = array('Content-Type: text/html; charset=UTF-8');
//        $emails = $option->sftpEmail;
//        if(!$msg || !$emails){
//            return;
//        }
//        $mail_attachment = $attachment ? array($attachment) : '';
//        wp_mail($emails, $subject, $msg,  $headers,  $mail_attachment);
    }

}