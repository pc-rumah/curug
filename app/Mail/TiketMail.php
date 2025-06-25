<?php

namespace App\Mail;

use App\Models\Order;

use setasign\Fpdi\Fpdi;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class TiketMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        // Generate PDF menggunakan FPDI
        $pdf = new Fpdi();
        $pdf->AddPage();
        // $pdf->setSourceFile(storage_path('app/public/tiket.pdf'));
        $pdf->setSourceFile(public_path('tiket.pdf'));
        $templateId = $pdf->importPage(1);
        $pdf->useTemplate($templateId);

        $pdf->SetFont('Arial', '', 12);
        $pdf->SetTextColor(0, 0, 0);

        $pdf->SetXY(75, 16);
        $pdf->SetFont('Arial', '', 14);
        $pdf->SetTextColor(0, 51, 102);
        $pdf->Write(0, $this->order->name);

        $pdf->SetXY(100, 59);
        $pdf->SetFont('Courier', 'B', 10);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Write(0, str_pad($this->order->order_code, 4, '0', STR_PAD_LEFT));

        $pdf->SetXY(170, 59);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Write(0, $this->order->qty . ' Tiket');

        // Simpan PDF sementara
        $pdfPath = storage_path('app/public/tiket_' . $this->order->id . '.pdf');
        $pdf->Output($pdfPath, 'F');

        // Kirim email dengan PDF terlampir
        return $this->subject('Tiket Wisata Anda')
            ->view('emails.tiket') // Buat view ini di resources/views/emails/tiket.blade.php
            ->attach($pdfPath, [
                'as' => 'Tiket-Wisata-' . $this->order->id . '.pdf',
                'mime' => 'application/pdf',
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tiket Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.tiket',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
