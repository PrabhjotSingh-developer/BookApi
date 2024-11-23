<?php

function fetchBooks($apiUrl,$cacheFile,$cacheTime = 3600)
{
    // echo $cacheFile;
    if (file_exists($cacheFile) && time() - filemtime($cacheFile) < $cacheTime) {
        // If cache is valid, use cached data
        $cachedData = file_get_contents($cacheFile);
        $decoded = json_decode($cachedData, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            return $decoded['data'];  // Return the 'data' array from the response
        } else {
            var_dump("Cache JSON Decode Error: " . json_last_error_msg());
        }
    } else {
        // If no valid cache, fetch data from API
        $response = file_get_contents($apiUrl);
        if ($response !== FALSE) {
            $decoded = json_decode($response, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                // Save the response to cache
                file_put_contents($cacheFile, $response);
                return $decoded['data'];  // Return the 'data' array from the API response
            } else {
                var_dump("API JSON Decode Error: " . json_last_error_msg());
            }
        } else {
            var_dump("API call failed.");
        }
    }

    return [];
}

?>