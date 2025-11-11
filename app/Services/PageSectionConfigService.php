<?php

namespace App\Services;

class PageSectionConfigService
{
    /**
     * Get all section configurations for a specific page
     */
    public static function getPageSections($pageName)
    {
        $sections = self::getAllSections();
        return $sections[$pageName] ?? [];
    }

    /**
     * Get all sections grouped by page
     */
    public static function getAllSections()
    {
        return [
            'index' => self::getIndexSections(),
            'about' => self::getAboutSections(),
            'services' => self::getServicesSections(),
            'contact' => self::getContactSections(),
            'common' => self::getCommonSections(),
            'insights' => self::getInsightsSections(),
            'success-stories' => self::getSuccessStoriesSections(),
        ];
    }

    /**
     * Get section configuration
     */
    private static function getSectionConfig($key, $label, $type = 'text', $options = [])
    {
        return array_merge([
            'key' => $key,
            'label' => $label,
            'type' => $type,
        ], $options);
    }

    /**
     * Index page sections
     */
    private static function getIndexSections()
    {
        return [
            self::getSectionConfig('hero_title', 'Hero Title', 'text'),
            self::getSectionConfig('hero_intro_text', 'Hero Intro Text', 'textarea'),
            self::getSectionConfig('hero_image', 'Hero Image', 'image'),
            self::getSectionConfig('philosophy_title', 'Philosophy Title', 'text_with_highlight'),
            self::getSectionConfig('philosophy_text', 'Philosophy Text', 'textarea'),
            self::getSectionConfig('services_title', 'Services Title', 'text_with_highlight'),
            self::getSectionConfig('service_1_title', 'Service 1 Title', 'text'),
            self::getSectionConfig('service_1_text', 'Service 1 Text', 'textarea'),
            self::getSectionConfig('service_1_image', 'Service 1 Image', 'image'),
            self::getSectionConfig('service_1_icon', 'Service 1 Icon', 'image'),
            self::getSectionConfig('service_2_title', 'Service 2 Title', 'text'),
            self::getSectionConfig('service_2_text', 'Service 2 Text', 'textarea'),
            self::getSectionConfig('service_2_image', 'Service 2 Image', 'image'),
            self::getSectionConfig('service_2_icon', 'Service 2 Icon', 'image'),
            self::getSectionConfig('service_3_title', 'Service 3 Title', 'text'),
            self::getSectionConfig('service_3_text', 'Service 3 Text', 'textarea'),
            self::getSectionConfig('service_3_image', 'Service 3 Image', 'image'),
            self::getSectionConfig('service_3_icon', 'Service 3 Icon', 'image'),
            self::getSectionConfig('themes_title', 'Themes Title', 'text'),
            self::getSectionConfig('theme_1_title', 'Theme 1 Title', 'text'),
            self::getSectionConfig('theme_1_text', 'Theme 1 Text', 'textarea'),
            self::getSectionConfig('theme_2_title', 'Theme 2 Title', 'text'),
            self::getSectionConfig('theme_2_text', 'Theme 2 Text', 'textarea'),
            self::getSectionConfig('theme_3_title', 'Theme 3 Title', 'text'),
            self::getSectionConfig('theme_3_text', 'Theme 3 Text', 'textarea'),
            self::getSectionConfig('themes_circular_image', 'Themes Circular Image', 'image'),
            self::getSectionConfig('themes_circular_caption', 'Themes Circular Caption', 'text'),
            self::getSectionConfig('team_title', 'Team Title', 'text'),
            self::getSectionConfig('team_background_image', 'Team Background Image', 'image'),
        ];
    }

    /**
     * About page sections
     */
    private static function getAboutSections()
    {
        return [
            self::getSectionConfig('hero_title', 'Hero Title', 'text_with_highlight'),
            self::getSectionConfig('hero_background_image', 'Hero Background Image', 'image'),
            self::getSectionConfig('who_we_are_title', 'Who We Are Title', 'text_with_highlight'),
            self::getSectionConfig('who_we_are_text', 'Who We Are Text', 'textarea'),
            self::getSectionConfig('vision_title', 'Vision Title', 'text_with_highlight'),
            self::getSectionConfig('vision_text', 'Vision Text', 'textarea'),
            self::getSectionConfig('mission_title', 'Mission Title', 'text_with_highlight'),
            self::getSectionConfig('mission_text', 'Mission Text', 'textarea'),
            self::getSectionConfig('section_image', 'Section Image', 'image'),
            self::getSectionConfig('values_title', 'Values Title', 'text'),
            self::getSectionConfig('value_1_title', 'Value 1 Title', 'text_with_number', ['number' => '01']),
            self::getSectionConfig('value_1_image', 'Value 1 Image', 'image'),
            self::getSectionConfig('value_2_title', 'Value 2 Title', 'text_with_number', ['number' => '02']),
            self::getSectionConfig('value_2_image', 'Value 2 Image', 'image'),
            self::getSectionConfig('value_3_title', 'Value 3 Title', 'text_with_number', ['number' => '03']),
            self::getSectionConfig('value_3_image', 'Value 3 Image', 'image'),
            self::getSectionConfig('value_4_title', 'Value 4 Title', 'text_with_number', ['number' => '04']),
            self::getSectionConfig('value_4_image', 'Value 4 Image', 'image'),
            self::getSectionConfig('shape_1_icon', 'Shape 1 Icon', 'image'),
            self::getSectionConfig('shape_2_icon', 'Shape 2 Icon', 'image'),
        ];
    }

    /**
     * Services page sections
     */
    private static function getServicesSections()
    {
        return [
            self::getSectionConfig('hero_title', 'Hero Title', 'text_with_highlight'),
            self::getSectionConfig('header_icon', 'Header Icon', 'image'),
            self::getSectionConfig('intro_text', 'Intro Text', 'textarea'),
            self::getSectionConfig('intro_hero_image', 'Intro Hero Image', 'image'),
            self::getSectionConfig('service_1_title', 'Service 1 Title', 'text'),
            self::getSectionConfig('service_1_description', 'Service 1 Description', 'textarea'),
            self::getSectionConfig('service_1_sub_1', 'Service 1 Sub-item 1', 'sub_service'),
            self::getSectionConfig('service_1_sub_2', 'Service 1 Sub-item 2', 'sub_service'),
            self::getSectionConfig('service_1_sub_3', 'Service 1 Sub-item 3', 'sub_service'),
            self::getSectionConfig('service_2_title', 'Service 2 Title', 'text'),
            self::getSectionConfig('service_2_description', 'Service 2 Description', 'textarea'),
            self::getSectionConfig('service_2_sub_1', 'Service 2 Sub-item 1', 'sub_service'),
            self::getSectionConfig('service_2_sub_2', 'Service 2 Sub-item 2', 'sub_service'),
            self::getSectionConfig('service_2_sub_3', 'Service 2 Sub-item 3', 'sub_service'),
            self::getSectionConfig('service_2_sub_4', 'Service 2 Sub-item 4', 'sub_service'),
            self::getSectionConfig('service_3_title', 'Service 3 Title', 'text'),
            self::getSectionConfig('service_3_description', 'Service 3 Description', 'textarea'),
            self::getSectionConfig('service_3_sub_1', 'Service 3 Sub-item 1', 'sub_service'),
            self::getSectionConfig('service_3_sub_2', 'Service 3 Sub-item 2', 'sub_service'),
            self::getSectionConfig('service_3_sub_3', 'Service 3 Sub-item 3', 'sub_service'),
            self::getSectionConfig('background_image', 'Background Image', 'image'),
            self::getSectionConfig('transformation_title', 'Transformation Title', 'text_with_highlight'),
            self::getSectionConfig('transformation_text', 'Transformation Text', 'textarea'),
            self::getSectionConfig('stat_1_value', 'Stat 1 Value', 'text'),
            self::getSectionConfig('stat_1_description', 'Stat 1 Description', 'textarea'),
            self::getSectionConfig('stat_1_graph', 'Stat 1 Graph', 'image'),
            self::getSectionConfig('stat_2_value', 'Stat 2 Value', 'text'),
            self::getSectionConfig('stat_2_description', 'Stat 2 Description', 'textarea'),
            self::getSectionConfig('stat_2_graph', 'Stat 2 Graph', 'image'),
            self::getSectionConfig('stat_3_value', 'Stat 3 Value', 'text'),
            self::getSectionConfig('stat_3_description', 'Stat 3 Description', 'textarea'),
            self::getSectionConfig('stat_3_graph', 'Stat 3 Graph', 'image'),
            self::getSectionConfig('faq_title', 'FAQ Title', 'text'),
            self::getSectionConfig('faq_1_question', 'FAQ 1 Question', 'text'),
            self::getSectionConfig('faq_1_answer', 'FAQ 1 Answer', 'textarea'),
            self::getSectionConfig('faq_2_question', 'FAQ 2 Question', 'text'),
            self::getSectionConfig('faq_2_answer', 'FAQ 2 Answer', 'textarea'),
            self::getSectionConfig('faq_3_question', 'FAQ 3 Question', 'text'),
            self::getSectionConfig('faq_3_answer', 'FAQ 3 Answer', 'textarea'),
            self::getSectionConfig('faq_4_question', 'FAQ 4 Question', 'text'),
            self::getSectionConfig('faq_4_answer', 'FAQ 4 Answer', 'textarea'),
        ];
    }

    /**
     * Contact page sections
     */
    private static function getContactSections()
    {
        return [
            self::getSectionConfig('hero_title', 'Hero Title', 'text_with_highlight'),
            self::getSectionConfig('hero_image', 'Hero Image', 'image'),
            self::getSectionConfig('circle_text_icon', 'Circle Text Icon', 'image'),
            self::getSectionConfig('contact_form_image', 'Contact Form Image', 'image'),
            self::getSectionConfig('contact_label', 'Contact Label', 'text_with_highlight'),
            self::getSectionConfig('contact_email', 'Contact Email', 'text'),
            self::getSectionConfig('careers_label', 'Careers Label', 'text_with_highlight'),
            self::getSectionConfig('careers_email', 'Careers Email', 'text'),
            self::getSectionConfig('business_hours_label', 'Business Hours Label', 'text_with_highlight'),
            self::getSectionConfig('business_hours_text', 'Business Hours Text', 'textarea'),
            self::getSectionConfig('social_media_label', 'Social Media Label', 'text_with_highlight'),
            self::getSectionConfig('your_info_label', 'Your Info Label', 'text_with_highlight'),
        ];
    }

    /**
     * Common sections (Let's Connect)
     */
    private static function getCommonSections()
    {
        return [
            self::getSectionConfig('lets_connect_text', 'Let\'s Connect Text', 'textarea'),
        ];
    }

    /**
     * Insights page sections
     */
    private static function getInsightsSections()
    {
        return [
            self::getSectionConfig('hero_title', 'Hero Title', 'text'),
            self::getSectionConfig('hero_description_1', 'Hero Description 1', 'textarea'),
            self::getSectionConfig('hero_description_2', 'Hero Description 2', 'textarea'),
            self::getSectionConfig('hero_background_image', 'Hero Background Image', 'image'),
            self::getSectionConfig('latest_insights_title', 'Latest Insights Title', 'text'),
        ];
    }

    /**
     * Success Stories page sections
     */
    private static function getSuccessStoriesSections()
    {
        return [
            self::getSectionConfig('hero_title', 'Hero Title', 'text_with_highlight'),
            self::getSectionConfig('hero_description', 'Hero Description', 'textarea'),
            self::getSectionConfig('hero_background_image', 'Hero Background Image', 'image'),
            self::getSectionConfig('stories_section_title', 'Stories Section Title', 'text_with_highlight'),
        ];
    }

    /**
     * Get section by key for a specific page
     */
    public static function getSection($pageName, $sectionKey)
    {
        $sections = self::getPageSections($pageName);
        foreach ($sections as $section) {
            if ($section['key'] === $sectionKey) {
                return $section;
            }
        }
        return null;
    }

    /**
     * Group sections by category for better organization
     */
    public static function getGroupedSections($pageName)
    {
        $sections = self::getPageSections($pageName);
        $grouped = [];

        foreach ($sections as $section) {
            $key = $section['key'];
            
            // Determine category based on key prefix
            if (strpos($key, 'hero_') === 0) {
                $category = 'Hero Section';
            } elseif (strpos($key, 'service_') === 0) {
                $category = 'Services';
            } elseif (strpos($key, 'theme_') === 0 || $key === 'themes_title' || $key === 'themes_circular') {
                $category = 'Themes';
            } elseif (strpos($key, 'value_') === 0 || $key === 'values_title') {
                $category = 'Values';
            } elseif (strpos($key, 'stat_') === 0) {
                $category = 'Statistics';
            } elseif (strpos($key, 'faq_') === 0 || $key === 'faq_title') {
                $category = 'FAQ';
            } elseif (strpos($key, 'contact_') === 0 || strpos($key, 'careers_') === 0 || strpos($key, 'business_') === 0 || strpos($key, 'social_') === 0 || strpos($key, 'your_') === 0) {
                $category = 'Contact Information';
            } elseif (strpos($key, 'latest_insights_') === 0 || strpos($key, 'insights_') === 0) {
                $category = 'Content Section';
            } elseif (strpos($key, 'stories_') === 0 || strpos($key, 'story_') === 0) {
                $category = 'Content Section';
            } else {
                $category = 'General';
            }

            if (!isset($grouped[$category])) {
                $grouped[$category] = [];
            }

            $grouped[$category][] = $section;
        }

        return $grouped;
    }
}

