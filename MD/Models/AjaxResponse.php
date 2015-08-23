<?php
namespace MD\Models;


use MD\Helpers\GetterSetter;

/**
 * Class AjaxResponse
 * @package MD\Models
 *
 * @property boolean $status
 * @property string $html
 * @property mixed $result
 * @property array $notification
 */
class AjaxResponse {
    use GetterSetter;

    protected $status = true;
    protected $html   = '';
    protected $result = null;
    protected $notification = [];

    /**
     * @param string $html
     */
    public function setHtml($html) {
        $this->html = $html;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result) {
        $this->result = $result;
    }

    /**
     * @param boolean $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @param array $notification
     */
    public function setNotification($notification) {
        $this->notification = $notification;
    }

    public function printJSON() {
        header('Content-Type: application/json');
        echo json_encode(get_object_vars($this), JSON_UNESCAPED_UNICODE);
    }


}