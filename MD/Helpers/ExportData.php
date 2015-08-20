<?php

namespace MD\Helpers;


class ExportData {

    private static function init($data, $headerTitle = [], $headerRGBColor = 'FCFCFC', $borderColor = 'CCC') {
        $phpExcel = new \PHPExcel();
        $phpExcel->getProperties()
            ->setCreator('Affiliates Team')
            ->setTitle('Excel Data');

        $phpExcelSheet = $phpExcel->createSheet(0);
        $phpExcelSheet->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
        $phpExcelSheet->getPageSetup()->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3);

        if(!empty($headerTitle)) {
            $tmpData = [];
            $columnKeys = array_keys($headerTitle);
            foreach($data as $dataTmpRow) {
                $tmpRow = [];
                foreach($columnKeys as $columnKey) {
                    $tmpRow[$columnKey] = isset($dataTmpRow[$columnKey])  ? $dataTmpRow[$columnKey] :  '';
                }
                $tmpData[] = $tmpRow;
            }
            $data = $tmpData;
        }
        $rowLength = count($data);
        if ($rowLength) {
            $keys = array_keys($data[0]);
            if(!empty($headerTitle)) {
                foreach($keys as &$keysRow) {
                    $keysRow = isset($headerTitle[$keysRow]) ? $headerTitle[$keysRow] : $keysRow;
                }
            }
            $columnLength = count($keys);
            $fromCode = \PHPExcel_Cell::stringFromColumnIndex(0);
            $toCode = \PHPExcel_Cell::stringFromColumnIndex($columnLength - 1);

            for ($i = 0; $i < $columnLength; $i++) {
                $phpExcelSheet->setCellValueByColumnAndRow($i, 1, $keys[$i]);
                $phpExcelSheet->getColumnDimension(chr(65 + $i))->setAutoSize(true);
            }
            // [merging], develop later
            // $phpExcelSheet->mergeCells('A1:A2');
            // $phpExcelSheet->getStyle('A1:A2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_JUSTIFY);
            $phpExcelSheet->fromArray($data, ' ', 'A3');
            for ($i = 0; $i < $rowLength; ++$i) {
                $rowIndex = $i + 1;
                if ($rowIndex % 3 == 0) {
                    if ($rowIndex / 3 % 2) {
                        self::colorRow($phpExcelSheet, $fromCode, $toCode, $i + 3, 'F9F9F9');
                    } else {
                        self::colorRow($phpExcelSheet, $fromCode, $toCode, $i + 3, 'F5FMD');
                    }
                } else {
                    self::colorRow($phpExcelSheet, $fromCode, $toCode, $i + 3, 'FFFFFF');
                }
            }

            self::colorRow($phpExcelSheet, $fromCode, $toCode, 1, $headerRGBColor);
            $headerStyle = [
                'font'      => ['bold' => true,],
                'alignment' => ['horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,]
            ];
            $phpExcelSheet->getStyle($fromCode . '1:' . $toCode . '1')->applyFromArray($headerStyle);

            self::setBorderStyle($phpExcelSheet, $fromCode, $toCode, $rowLength+2, $borderColor);
        }

        return $phpExcel;
    }

    public static function excelExport($data, $headerTitle = [], $headerRGBColor = 'FCFCFC') {
        $phpExcel = self::init($data, $headerTitle, $headerRGBColor);
        $objWriter = new \PHPExcel_Writer_Excel5($phpExcel);
        $objWriter->save('php://output');
    }

    public static function pdfExport($data, $headerTitle = [], $headerRGBColor = 'FCFCFC') {
        $rendererName = \PHPExcel_Settings::PDF_RENDERER_DOMPDF;
        $rendererLibraryPath = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'dompdf'.DIRECTORY_SEPARATOR.'dompdf';

        if (!\PHPExcel_Settings::setPdfRenderer($rendererName, $rendererLibraryPath)) {
            return false;
        }

        $phpExcel = self::init($data, $headerTitle, $headerRGBColor);

        $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'PDF');
        $objWriter->save('php://output');
        return true;
    }

    protected function colorRow(\PHPExcel_Worksheet $phpExcelSheet, $from, $to, $rowIndex, $color) {
        $header = $from . $rowIndex . ':' . $to . $rowIndex;
        $phpExcelSheet->getStyle($header)->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB($color);
    }

    protected function setBorderStyle(\PHPExcel_Worksheet $phpExcelSheet, $fromCode, $toCode, $rowLength, $color) {
        $borderStyle = [
            'borders'   => [
                'inside'  => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => $color
                    ]
                ],
                'outline' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => $color
                    ]
                ]
            ]
        ];
        $phpExcelSheet->getStyle($fromCode . '1:' . $toCode . $rowLength)->applyFromArray($borderStyle);
    }
}