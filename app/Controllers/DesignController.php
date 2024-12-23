<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Exceptions\HTTPException;
use App\Models\NewsModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class DesignController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function design_one()
    {
        return view('design_one');
    }
    public function design_two()
    {
        return view('design_two');
    }
    public function design_three()
    {
        return view('design_three');
    }
    public function design_four()
    {
        return view('design_four');
    }

    public function generateOne($newsId)
    {
        // Increase maximum execution time to 2 minutes (120 seconds)
        set_time_limit(120);  // Adjust this value based on your needs

        // Load the news model to retrieve the news data
        $newsModel = new NewsModel();  // Make sure this points to your correct model
        $newsData = $newsModel->find($newsId);  // Replace with your method for fetching news by ID

        // Check if the news exists
        if (!$newsData) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('News not found');
        }

        // Prepare HTML content to be passed to the PDF generator
        $html = view('UserPage/design_one', ['newsData' => $newsData]);

        // Define the filename and orientation
        $filename = 'news_one_' . $newsId;
        $orientation = 'portrait';  // Set as 'landscape' if preferred

        // Call the generatePDF method to generate the PDF
        return $this->generatePDFContent($html, $filename, $orientation);
    }

    public function generateTwo($newsId)
    {
        // Increase maximum execution time to 2 minutes (120 seconds)
        set_time_limit(120);  // Adjust this value based on your needs

        // Load the news model to retrieve the news data
        $newsModel = new NewsModel();  // Make sure this points to your correct model
        $newsData = $newsModel->find($newsId);  // Replace with your method for fetching news by ID

        // Check if the news exists
        if (!$newsData) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('News not found');
        }

        // Prepare HTML content to be passed to the PDF generator
        $html = view('UserPage/design_two', ['newsData' => $newsData]);

        // Define the filename and orientation
        $filename = 'news_two_' . $newsId;
        $orientation = 'portrait';  // Set as 'landscape' if preferred

        // Call the generatePDF method to generate the PDF
        return $this->generatePDFContent($html, $filename, $orientation);
    }
    public function generateThree($newsId)
    {
        // Increase maximum execution time to 2 minutes (120 seconds)
        set_time_limit(120);  // Adjust this value based on your needs

        // Load the news model to retrieve the news data
        $newsModel = new NewsModel();  // Make sure this points to your correct model
        $newsData = $newsModel->find($newsId);  // Replace with your method for fetching news by ID

        // Check if the news exists
        if (!$newsData) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('News not found');
        }

        // Prepare HTML content to be passed to the PDF generator
        $html = view('UserPage/design_three', ['newsData' => $newsData]);

        // Define the filename and orientation
        $filename = 'news_three_' . $newsId;
        $orientation = 'portrait';  // Set as 'landscape' if preferred

        // Call the generatePDF method to generate the PDF
        return $this->generatePDFContent($html, $filename, $orientation);
    }
    public function generateFour($newsId)
    {
        // Increase maximum execution time to 2 minutes (120 seconds)
        set_time_limit(120);  // Adjust this value based on your needs

        // Load the news model to retrieve the news data
        $newsModel = new NewsModel();  // Make sure this points to your correct model
        $newsData = $newsModel->find($newsId);  // Replace with your method for fetching news by ID

        // Check if the news exists
        if (!$newsData) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('News not found');
        }

        // Prepare HTML content to be passed to the PDF generator
        $html = view('UserPage/design_four', ['newsData' => $newsData]);

        // Define the filename and orientation
        $filename = 'news_four_' . $newsId;
        $orientation = 'portrait';  // Set as 'landscape' if preferred

        // Call the generatePDF method to generate the PDF
        return $this->generatePDFContent($html, $filename, $orientation);
    }
    private function generatePDFContent($html, $filename, $orientation)
    {
        // Load Dompdf library
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isRemoteEnabled', true); // Enable remote resource loading (e.g., images)
        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml($html, 'UTF-8');

        // Set paper size and orientation
        $dompdf->setPaper('A4', $orientation);

        // Render PDF (first pass)
        $dompdf->render();

        // Output the generated PDF
        $pdfOutput = $dompdf->output();

        // Check if PDF output is valid
        if (!$pdfOutput) {
            log_message('error', 'Failed to generate PDF output.');
            return false;  // Return false if PDF generation fails
        }

        // Set headers to force the browser to render the PDF
        return $this->response->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '.pdf"')
            ->setBody($pdfOutput);
    }
}
