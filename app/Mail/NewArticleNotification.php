<?php

namespace App\Mail;

use App\Models\Insight;
use App\Models\Story;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewArticleNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $article;
    public $articleType; // 'insight' or 'story'
    public $subscriberEmail;
    public $language;

    /**
     * Create a new message instance.
     */
    public function __construct($article, string $articleType, string $subscriberEmail, string $language = 'en')
    {
        $this->article = $article;
        $this->articleType = $articleType;
        $this->subscriberEmail = $subscriberEmail;
        $this->language = $language;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $translation = $this->article->translation($this->language);
        $title = $translation ? $translation->title : 'New Article';
        
        $subject = $this->language === 'ar' 
            ? 'مقال جديد: ' . $title
            : 'New Article: ' . $title;

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.new-article-notification',
            with: [
                'article' => $this->article,
                'articleType' => $this->articleType,
                'language' => $this->language,
            ],
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
