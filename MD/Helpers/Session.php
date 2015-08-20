<?php


namespace MD\Helpers;

/**
 * Class Session
 * @package MD\Helpers
 *
 * @property bool $isLogged
 * @property string $language
 */
class Session {
    private $session;

    public function __construct() {
        $config = Config::getInstance();
        if($config->useSession) {
            $this->session =& $_SESSION;
        } else {
            $this->session = [];
        }
    }

    public function __get($nm) {
        if (isset($this->session[$nm])) {
            return $this->session[$nm];
        }
        return NULL;
    }

    public function __isset($nm) {
        return isset($this->session[$nm]);
    }

    public function __unset($nm) {
        if (isset($this->session[$nm])) {
            unset($this->session[$nm]);
        }
    }

    public function __set($nm, $val) {
        $this->session[$nm] = $val;
    }

    public function clear() {
        $this->session = [];
    }

    public function getSessionID() {
        return session_id();
    }
}