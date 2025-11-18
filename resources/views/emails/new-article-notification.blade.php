<!DOCTYPE html>
<html lang="{{ $language }}" dir="{{ $language === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $language === 'ar' ? 'مقال جديد' : 'New Article' }}</title>
    <style>
        body {
            font-family: {{ $language === 'ar' ? "'LamaSans', 'Arial', 'Tahoma', sans-serif" : "Arial, sans-serif" }};
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #4C489D 0%, #3a3578 100%);
            color: #ffffff;
            padding: 30px 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .email-body {
            padding: 30px 20px;
        }
        .article-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            margin: 20px 0;
            background: #ffffff;
        }
        .article-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }
        .article-content {
            padding: 20px;
        }
        .article-category {
            display: inline-block;
            background-color: #4C489D;
            color: #ffffff;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        .article-title {
            font-size: 22px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0 0 15px 0;
            line-height: 1.3;
        }
        .article-description {
            font-size: 16px;
            color: #666;
            margin: 0 0 20px 0;
            line-height: 1.6;
        }
        .read-more-button {
            display: inline-block;
            background-color: #4C489D;
            color: #ffffff;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .read-more-button:hover {
            background-color: #3a3578;
        }
        .email-footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
            border-top: 1px solid #e0e0e0;
        }
        .unsubscribe-link {
            color: #4C489D;
            text-decoration: none;
            font-size: 12px;
        }
        .unsubscribe-link:hover {
            text-decoration: underline;
        }
        @media only screen and (max-width: 600px) {
            body {
                padding: 10px;
            }
            .email-body {
                padding: 20px 15px;
            }
            .article-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>{{ $language === 'ar' ? 'مقال جديد من تؤدة' : 'New Article from Toada' }}</h1>
        </div>
        
        <div class="email-body">
            <p style="font-size: 16px; color: #333; margin-bottom: 20px;">
                {{ $language === 'ar' 
                    ? 'نحن متحمسون لمشاركة مقال جديد معك!' 
                    : 'We\'re excited to share a new article with you!' }}
            </p>

            @php
                $translation = $article->translation($language);
                $category = $language === 'ar' ? $article->category_ar : $article->category_en;
                $routeName = $articleType === 'insight' ? 'insights-description' : 'story-description';
                $articleUrl = route($routeName, $article->slug);
                $featuredImage = $article->featured_image ? asset('storage/' . $article->featured_image) : null;
            @endphp

            <div class="article-card">
                @if($featuredImage)
                <img src="{{ $featuredImage }}" alt="{{ $translation ? $translation->title : '' }}" class="article-image">
                @endif
                
                <div class="article-content">
                    <span class="article-category">{{ $category }}</span>
                    
                    @if($translation)
                    <h2 class="article-title">{{ $translation->title }}</h2>
                    
                    <p class="article-description">
                        {{ \Illuminate\Support\Str::limit(strip_tags($translation->description), 150) }}
                    </p>
                    @endif
                    
                    <a href="{{ $articleUrl }}" class="read-more-button">
                        {{ $language === 'ar' ? 'اقرأ المزيد' : 'Read More' }}
                    </a>
                </div>
            </div>

            <p style="font-size: 14px; color: #666; margin-top: 30px;">
                {{ $language === 'ar' 
                    ? 'شكراً لك على كونك جزءاً من مجتمعنا!' 
                    : 'Thank you for being part of our community!' }}
            </p>
        </div>
        
        <div class="email-footer">
            <p style="margin: 0 0 10px 0;">
                {{ $language === 'ar' 
                    ? 'تم إرسال هذا البريد الإلكتروني لأنك اشتركت في نشرتنا الإخبارية.' 
                    : 'You received this email because you subscribed to our newsletter.' }}
            </p>
            <!-- <p style="margin: 0; font-size: 12px;">
                <a href="{{ route('insights') }}" class="unsubscribe-link">
                    {{ $language === 'ar' ? 'إلغاء الاشتراك' : 'Unsubscribe' }}
                </a>
            </p> -->
        </div>
    </div>
</body>
</html>

