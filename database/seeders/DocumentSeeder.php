<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $abcs = [
            [
                'company' => 'PT. ABC',
                'division' => 'Finance & Accounting',
                'dept' => 'Finance',
                'name' => 'Settlement',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. ABC',
                'division' => 'Finance & Accounting',
                'dept' => 'Finance',
                'name' => 'Payment Voucher',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. ABC',
                'division' => 'Finance & Accounting',
                'dept' => 'Finance',
                'name' => 'Advance',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. ABC',
                'division' => 'Finance & Accounting',
                'dept' => 'Finance',
                'name' => 'OR-Official Receipt',
                'filename' => rand(1, 3) . '.pdf',
            ],
            
            [
                'company' => 'PT. ABC',
                'division' => 'Finance & Accounting',
                'dept' => 'Accounting',
                'name' => 'GL-Jurnal',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. ABC',
                'division' => 'Finance & Accounting',
                'dept' => 'Accounting',
                'name' => 'AR Aging',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. ABC',
                'division' => 'Finance & Accounting',
                'dept' => 'Accounting',
                'name' => 'AP Aging',
                'filename' => rand(1, 3) . '.pdf',
            ],
            
            [
                'company' => 'PT. ABC',
                'division' => 'Finance & Accounting',
                'dept' => 'IT',
                'name' => 'IT Purchase',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. ABC',
                'division' => 'Finance & Accounting',
                'dept' => 'IT',
                'name' => 'IT Schedule',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. ABC',
                'division' => 'Finance & Accounting',
                'dept' => 'Operation',
                'name' => 'Sales',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. ABC',
                'division' => 'Finance & Accounting',
                'dept' => 'Operation',
                'name' => 'Petty Cash',
                'filename' => rand(1, 3) . '.pdf',
            ],
        ];

        $xyzs = [
            [
                'company' => 'PT. XYZ',
                'division' => 'Finance & Accounting',
                'dept' => 'Finance',
                'name' => 'Settlement',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. XYZ',
                'division' => 'Finance & Accounting',
                'dept' => 'Finance',
                'name' => 'Payment Voucher',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. XYZ',
                'division' => 'Finance & Accounting',
                'dept' => 'Finance',
                'name' => 'Advance',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. XYZ',
                'division' => 'Finance & Accounting',
                'dept' => 'Finance',
                'name' => 'OR-Official Receipt',
                'filename' => rand(1, 3) . '.pdf',
            ],
            
            [
                'company' => 'PT. XYZ',
                'division' => 'Finance & Accounting',
                'dept' => 'Accounting',
                'name' => 'GL-Jurnal',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. XYZ',
                'division' => 'Finance & Accounting',
                'dept' => 'Accounting',
                'name' => 'AR Aging',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. XYZ',
                'division' => 'Finance & Accounting',
                'dept' => 'Accounting',
                'name' => 'AP Aging',
                'filename' => rand(1, 3) . '.pdf',
            ],
            
            [
                'company' => 'PT. XYZ',
                'division' => 'Finance & Accounting',
                'dept' => 'IT',
                'name' => 'IT Purchase',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. XYZ',
                'division' => 'Finance & Accounting',
                'dept' => 'IT',
                'name' => 'IT Schedule',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. XYZ',
                'division' => 'Finance & Accounting',
                'dept' => 'Operation',
                'name' => 'Sales',
                'filename' => rand(1, 3) . '.pdf',
            ],
            [
                'company' => 'PT. XYZ',
                'division' => 'Finance & Accounting',
                'dept' => 'Operation',
                'name' => 'Petty Cash',
                'filename' => rand(1, 3) . '.pdf',
            ],
        ];

        foreach ($abcs as $key => $value) {
            Document::create($value);
        }

        foreach ($xyzs as $key => $value) {
            Document::create($value);
        }
    }
}
