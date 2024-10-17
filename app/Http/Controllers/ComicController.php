<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComicController extends Controller
{

    public function index()
    {
        // Fetch the comic data from the API
        $response = Http::get('https://otruyenapi.com/v1/api/home');

        // Initialize comics to an empty array
        $comics = [];

        // Check if the response is successful
        if ($response->successful()) {
            // Get the comic items from the response
            $comics = $response->json()['data']['items'] ?? []; // Default to empty array if null
        } else {
            // Handle the error case (optional)
            return back()->withErrors('Could not fetch comic data.');
        }

        // Return the view for home page with comics data
        return view('home', compact('comics'));
    }

    public function getComics()
    {
        // Fetch comics from the API or database
        $comics = []; // Replace this with your logic to get comics

        return view('comics.index', compact('comics')); // Ensure 'comics.index' view exists
    }
    public function show($id)
    {
        // Fetch specific comic data using the correct API URL
        $response = file_get_contents("https://otruyenapi.com/v1/api/home"); // Use the correct API
        $data = json_decode($response, true);

        // Search for the comic by ID
        if ($data['status'] === 'success') {
            $comic = collect($data['data']['items'])->firstWhere('_id', $id);
            return view('comics.show', compact('comic'));
        } else {
            // Handle error (comic not found, etc.)
            return redirect()->route('comics.index')->with('error', 'Comic not found.');
        }
    }

    public function showChapter($chapterId)
    {
        // Fetch the chapter details
        $chapterResponse = Http::get("https://sv1.otruyencdn.com/v1/api/chapter/{$chapterId}");
        $chapterData = $chapterResponse->json();
    
        // Check if the chapter was fetched successfully
        if ($chapterData['status'] !== 'success') {
            abort(404, 'Chapter not found');
        }
    
        // Extract the chapter details
        $chapterDetails = $chapterData['data']['item'];
    
        // Get image URLs
        $imageUrls = array_map(function ($image) use ($chapterData) {
            return $chapterData['data']['domain_cdn'] . '/' . $chapterDetails['chapter_path'] . '/' . $image['image_file'];
        }, $chapterDetails['chapter_image']);
    
        // Return the view with chapter details and image URLs
        return view('comics.chapter', compact('chapterDetails', 'imageUrls'));
    }
    
    
}
