<?php
require_once(ROOTPATH . 'Vendor/autoload.php'); // Adjust the path as necessary

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

// Create a new Spreadsheet instance
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set document properties
$spreadsheet->getProperties()->setCreator('Your Name')
    ->setTitle('Laporan User')
    ->setSubject('Laporan User');

// Set headers for the Excel file
$sheet->setCellValue('A1', 'Laporan User');
$sheet->mergeCells('A1:E1');
$sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);

// Set website name and date range
$sheet->setCellValue('A3', 'Tanggal Kasus: ' . (isset($startDate) ? $startDate : '0000-00-00') . ' - ' . (isset($endDate) ? $endDate : '9999-12-31'));

// Set table headers
$headers = ['No', 'Username', 'Search', 'Tanggal'];
$col = 'A';
foreach ($headers as $header) {
    $sheet->setCellValue($col . '5', $header);
    $sheet->getStyle($col . '5')->getFont()->setBold(true);
    $sheet->getStyle($col . '5')->getAlignment()->setHorizontal('center');
    $col++;
}

// Add items
$row = 6;
foreach ($kelas as $key) {
    $sheet->setCellValue('A' . $row, $row - 5); // Numbering starting from 1
    $sheet->setCellValue('B' . $row, htmlspecialchars($key->username, ENT_QUOTES, 'UTF-8'));
    $sheet->setCellValue('C' . $row, htmlspecialchars($key->search, ENT_QUOTES, 'UTF-8'));
    $sheet->setCellValue('D' . $row, htmlspecialchars($key->create_at, ENT_QUOTES, 'UTF-8'));
    $row++;
}

// Set table borders
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
        ],
    ],
];

// Apply borders to the table
$sheet->getStyle('A5:D' . ($row - 1))->applyFromArray($styleArray);

// Header styling
$sheet->getStyle('A5:D5')->applyFromArray([
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'color' => ['argb' => 'FFFF00'], // Yellow background for header
    ],
]);

// Set column widths
foreach (range('A', 'D') as $columnID) {
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
}

// Create a new Writer instance
$writer = new Xlsx($spreadsheet);

// Format startDate and endDate for filename
$startDateFormatted = isset($startDate) ? date('Y-m-d', strtotime($startDate)) : '0000-00-00';
$endDateFormatted = isset($endDate) ? date('Y-m-d', strtotime($endDate)) : '9999-12-31';
$filename = 'laporan_user_' . $startDateFormatted . '_to_' . $endDateFormatted . '.xlsx';

// Output the Excel file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Save the file to output
$writer->save('php://output');

// Exit the script
exit;
?>
