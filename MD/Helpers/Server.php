<?php
namespace MD\Helpers;

class Server {

    public static function request($In) {
        $config = Config::getInstance();
        $fp = @fsockopen($config->serverIP, $config->serverPort, $Errno, $Errstr, 10);
        if (!$fp) {
            $response = [
                'error_resp' => true,
                'Code'       => "WEB_SOCKET_OPEN",
                'Text'       => $Errno.": ".$Errstr
            ];
        } else {
            $response = "";
            $Hex = sprintf("%08x", strlen($In));
            fwrite($fp, $Hex . $In);
            while (!feof($fp)) {
                $response .= fgets($fp, 4096);
            }
            fclose($fp);

            if (trim($response) == "") {
                $response = [
                    'error_resp' => true,
                    'Code'       => "WEB_SOCKET_EMPTY_BODY",
                    'Text'       => "Empty body"
                ];

            }
        }
        return $response;
    }

    public static function send($xml) {
        $res = self::request($xml);
        $xml = XML2Array::createArray($res);
        return ($xml) ? $xml : false;
    }
}
