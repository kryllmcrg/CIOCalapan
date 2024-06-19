<?php

if (!function_exists('html_to_pdf')) {
    function html_to_pdf($html, $filename, $paperSize = 'letter', $orientation = 'portrait') {
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper($paperSize, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output PDF
        $dompdf->stream($filename);
    }
}

// Your HTML content
$html = '<span class="post-pdf">...</span>';

// Generate PDFs with different paper sizes and orientations
html_to_pdf($html, 'news-article-a4-portrait.pdf', 'A4', 'portrait');
html_to_pdf($html, 'news-article-letter-landscape.pdf', 'letter', 'landscape');
html_to_pdf($html, 'news-article-legal-portrait.pdf', 'legal', 'portrait');
// Add more calls as needed...
