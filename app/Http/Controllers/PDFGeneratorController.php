<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Http;

class PDFGeneratorController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf();
    }

    public function getPopulations(){
        $response = Http::get("http://127.0.0.1:8000/api/populations");
        return json_decode($response->body());

    }
    public function getVaccines(){
        $response = Http::get("http://127.0.0.1:8000/api/vaccines");
        return json_decode($response->body());

    }

    public function index()
    {
        $this->fpdf->AddPage('P','A4');        
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->Image(public_path('hero.png'),0,0,212,55,'PNG');
        $this->fpdf->Ln(50);
        $this->fpdf->Cell(0, 10, 'Table of states: ', 0, 1);
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial','', 12);
        $this->fpdf->SetFillColor(255,255,255);
        $this->fpdf->SetTextColor(40,40,40);
        $this->fpdf->SetDrawColor(88,88,88);
        $this->fpdf->Cell(30, 10, 'State Name', 0, 0, 'C',1);
        $this->fpdf->Cell(45, 10, 'Total Population', 0, 0, 'C',1);
        $this->fpdf->Cell(60, 10, 'Vaccinated Population', 0, 0, 'C',1);
        $this->fpdf->Cell(55, 10, 'Unvaccinated Population', 0, 0, 'C',1);
        $this->fpdf->SetDrawColor(61,174,233);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->Line(10,90,200,90);
        $this->fpdf->SetTextColor(0,0,0);
        $this->fpdf->Ln();
        //body table
        $this->fpdf->SetFillColor(240,240,240);
        $this->fpdf->SetTextColor(40,40,40);
        $this->fpdf->SetDrawColor(255,255,255);
        $this->fpdf->Ln();
        $populations = $this->getPopulations();
        foreach($populations as $population){
            $this->fpdf->Cell(30, 10, $population->states, 0, 0, 'C',1);
            $this->fpdf->Cell(45, 10, number_format($population->total_population,0,','), 0, 0, 'C',1);
            $this->fpdf->Cell(60, 10, number_format($population->unvaccinated_population,0,','), 0, 0, 'C',1);
            $this->fpdf->Cell(55, 10, number_format($population->vaccinated_population,0,','), 0, 1, 'C',1);
        }
        $this->fpdf->AddPage('P','A4');        
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->Cell(0, 10, 'Table of vaccines: ', 0, 1);
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial','', 12);
        $this->fpdf->SetFillColor(255,255,255);
        $this->fpdf->SetTextColor(40,40,40);
        $this->fpdf->SetDrawColor(88,88,88);
        $this->fpdf->Cell(30, 10, 'Vaccine Name', 0, 0, 'C',1);
        $this->fpdf->Cell(45, 10, 'Available Quantity', 0, 0, 'C',1);
        $this->fpdf->Cell(60, 10, 'Vaccine Type', 0, 0, 'C',1);
        $this->fpdf->Cell(55, 10, 'Vaccine Creator', 0, 0, 'C',1);
        $this->fpdf->SetDrawColor(61,174,233);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->Line(10,42,200,42);
        $this->fpdf->SetTextColor(0,0,0);
        $this->fpdf->Ln();
        //body table
        $this->fpdf->SetFillColor(240,240,240);
        $this->fpdf->SetTextColor(40,40,40);
        $this->fpdf->SetDrawColor(255,255,255);
        $this->fpdf->Ln();
        $vaccines = $this->getVaccines();
        foreach($vaccines as $vaccine){
            $this->fpdf->Cell(30, 10, $vaccine->vaccine_name, 0, 0, 'C',1);
            $this->fpdf->Cell(45, 10, number_format($vaccine->available_quantity,0,','), 0, 0, 'C',1);
            $this->fpdf->Cell(60, 10, $vaccine->vaccine_type, 0, 0, 'C',1);
            $this->fpdf->Cell(55, 10, $vaccine->vaccine_creator, 0, 1, 'C',1);
        }
        $this->fpdf->Ln();
        $this->fpdf->Text(10,280,'Report generated on: '.date('d/m/Y H:i'));
        $this->fpdf->Output('D','report.pdf');
    }
}
