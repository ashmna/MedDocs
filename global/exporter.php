<?php
namespace {
    require_once dirname(__DIR__) . '/vendor/autoload.php';

    use MD\Helpers\App;
    use MD\Helpers\Config;
    use MD\Helpers\ExportData;

    Config::init();
    $app = App::getInstance();


    $fileType = isset($_GET['T']) ? $_GET['T'] : 'e';
    $arguments = $_GET['_'];
    if(!is_array($arguments)) $arguments = [];
    $className  = str_replace('-', '', $_GET['S']);
    $methodName = str_replace('-', '', $_GET['M']);
    if (empty($className)) {
        exit;
        //throw new \Exception('empty class name');
    }
    if (empty($methodName)) {
        exit;
        //throw new \Exception('empty method name');
    }
    $className = 'MD\Services\\' . ucfirst($className) . 'Service';

    try {
        $data = $app->call($className, $methodName, $arguments);
        $fileName = isset($_GET['N']) ? $_GET['N'] : 'untitled';
        header("Pragma: public");
        switch ($fileType) {
            case 'p':
                //            $fileType = 'pdf';
                header('Content-type: application/pdf');
                header("Content-Disposition: attachment; filename={$fileName}.pdf");
                ExportData::pdfExport($data['records'], $data['titles']);
                break;
            default :
                //            $fileType = 'excel';
                header('Content-type: application/octet-stream');
                header("Content-Disposition: attachment; filename={$fileName}.xls");
                ExportData::excelExport($data['records'], $data['titles']);
                break;
        }
    } catch (\Exception $e) {
        exit;
    }



//    header("Pragma: public");
//    header("Expires: 0");
//    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//header("Content-Type: application/force-download");
//header("Content-Type: application/octet-stream");
//    header("Content-Type: application/download");
//    header("Content-Transfer-Encoding: binary ");
}