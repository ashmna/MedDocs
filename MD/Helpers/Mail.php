<?php


namespace MD\Helpers;


use MD\Models\Dictionary;

class Mail {
    /**
     * @param string $mailSenderInfo
     * @return \PHPMailer
     */

    static protected $mail;

    public static function getMailInstance($mailSenderInfo = 'default', $imageUrl = '') {
        $mail = new \PHPMailer;
        $config = Config::getInstance();
        $mail->IsSMTP();
        $mail->SMTPAuth   = $config->email('smtp.auth');
        $mail->Host       = $config->email('smtp.host');
        $mail->Port       = $config->email('smtp.port');
        //$mail->SMTPSecure = $config->email('smtp.secure');

        //$mail->Username = $config->email('smtp.username');
        //$mail->Password = $config->email('smtp.password');

        $fromEmail = $config->email($mailSenderInfo.'.email');
        $mail->From = empty($fromEmail) ? $config->getInstance()->getPartnerEmail() : $fromEmail;

        $fromName = $config->email($mailSenderInfo.'.name');
        $mail->FromName = empty($fromName) ? $config->getInstance()->getPartnerName().' Affiliates Team' : $fromName;

        $newPassword = $config->email($mailSenderInfo.'.password');
        if(!empty($newPassword)) {
            $mail->Username = $config->email($mailSenderInfo.'.email');
            $mail->Password = $newPassword;
        }
        if(strlen($imageUrl) > 0) {
            $mail->AddEmbeddedImage($imageUrl, 'img_newsletter', 'img_newsletter.jpg', 'base64', 'application/octet-stream');
        }

        return $mail;
    }

    public static function composeMessage(\PHPMailer $mail, MailInterface $model) {
        $mail->Subject  = $model->getSubject();
        $mail->Body     = $model->getBody();
        $mail->IsHTML(true);
        $mail->AddAddress($model->getAddress());

        return $mail;
    }

    public static function syncDictionaryItem(\PHPMailer $mail, $keyName, $lang = '', array $params = []) {
        $app = App::getInstance();
        /** @var \MD\DAO\Dictionary $dictionaryDAO */
        $dictionaryDAO = $app->container->get('MD\DAO\Dictionary');
        $config = Config::getInstance();
        if(empty($lang)) {
            $lang = $config->currentLocale;
        }
        $params['name']         = $config->partnerName;
        $params['url']          = $config->getPartnerSiteUrl();
        $params['affiliateUrl'] = $config->partnerUrl;

        $params1 = [];
        foreach($params as $key => $value) {
            $params1['{'.$key.'}'] = $value;
        }
        $params = $params1;

        $dictionary = $dictionaryDAO->getDictionaryItem($keyName, $lang);
        if(isset($dictionary)) {
            $mail->isHTML(true);
            $mail->Subject = strtr($dictionary->title, $params);
            $mail->Body = strtr($dictionary->content, $params);
        }
        return $mail;
    }


}