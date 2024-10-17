<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Article;

class FetchArticles extends Command
{
    protected $signature = 'fetch:articles';
    protected $description = 'Fetch articles from NewsAPI and store them in the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $apiKey = env('NEWS_API_KEY'); // Add your NewsAPI key to the .env file
        $response = Http::get("https://newsapi.org/v2/top-headlines?country=us&apiKey={$apiKey}");

        if ($response->successful()) {
            $articles = $response->json()['articles'];

            foreach ($articles as $articleData) {
                Article::updateOrCreate(
                    ['title' => $articleData['title']],
                    [
                        'content' => $articleData['content'] ?? 'Content not available',
                        'image_url' => $articleData['urlToImage'] ?? null,
                    ]
                );
            }

            $this->info('Articles fetched successfully.');
        } else {
            $this->error('Failed to fetch articles.');
            $this->error('Response: ' . $response->body());
        }
    }
}
