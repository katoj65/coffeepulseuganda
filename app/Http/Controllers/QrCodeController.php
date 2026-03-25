<?php

namespace App\Http\Controllers;

use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QrCodeController extends Controller
{
    /**
     * Generate a QR code for a traceability batch URL.
     */
    public function traceability(Request $request, string $batch): Response
    {
        $size = (int) $request->integer('size', 192);
        $size = max(96, min($size, 1024));

        $url = route('traceability.show', ['batch' => $batch], true);

        return response($this->generateQrCode($url, $size), 200, [
            'Content-Type' => 'image/svg+xml',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }

    /**
     * Render an SVG QR code.
     */
    protected function generateQrCode(string $contents, int $size = 192): string
    {
        return (new Writer(
            new ImageRenderer(
                new RendererStyle(
                    $size,
                    0,
                    null,
                    null,
                    Fill::uniformColor(
                        new Rgb(255, 255, 255),
                        new Rgb(39, 19, 16)
                    )
                ),
                new SvgImageBackEnd()
            )
        ))->writeString($contents);
    }
}
