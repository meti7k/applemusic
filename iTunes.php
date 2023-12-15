<?php

class Search {

    // Search keywords
    public $keywords;

    // JSON data containing search results
    private $json_data;

    // API endpoint for search
    private $json_api;

    // JSON results of the search
    private $json_results;

    /**
     * Constructor
     * 
     * @param string $keywords - Search keywords
    */
    public function __construct($keywords = "") 
    {
        $this->keywords = $keywords;
        $this->json_data = [];

        // Perform search automatically if keywords are provided
        if (!empty($keywords)) {
            $this->searchKeywords();
        }
    }

    /**
     * Perform search based on keywords
     */
    private function searchKeywords() 
    {
        $this->json_api = 'https://itunes.apple.com/search?term=' . urlencode($this->keywords);
        $this->json_results = file_get_contents($this->json_api);
        $this->json_data = json_decode($this->json_results);
    }

    /**
     * Create JSON results of the search
     */
    public function ResultData() 
    {
        $data = [];
        $data["results"] = [];

        // Process search results
        if ($this->json_data) {
            foreach ($this->json_data->results as $json_data) {
                if (!empty($json_data->kind) && $json_data->kind == "song") {
                    // Build an array for each song result
                    $build_array = [
                        "kind" => "song",
                        "artistName" => $json_data->artistName ?? null,
                        "artworkUrl100" => $json_data->artworkUrl100 ?? null,
                        "previewUrl" => $json_data->previewUrl ?? null,
                        "trackName" => $json_data->trackName ?? null,
                        "trackPrice" => $json_data->trackPrice ?? null,
                        "currency" => $json_data->currency ?? null,
                        "collectionName" => $json_data->collectionName ?? null,
                        "country" => $json_data->country ?? null,
                        "trackViewUrl" => $json_data->trackViewUrl ?? null,
                    ];
                    array_push($data["results"], $build_array);
                }
            }
        }

        // Convert the array to JSON and echo
        echo json_encode($data);
    }
}

?>
