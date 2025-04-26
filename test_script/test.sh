#!/bin/bash

# Check if a folder is provided as an argument
if [ -z "$1" ]; then
    echo "Usage: $0 <output_folder>"
    exit 1
fi

# Folder where the output files will be saved
output_folder="$1"

# Create the output folder if it does not exist
mkdir -p "$output_folder"

# Array of URLs to process
urls=(
    "http://192.168.56.50/phpfs/framework/ci4/public/"
    "http://192.168.56.50/phpfs/framework/fat-free/"
    "http://192.168.56.50/phpfs/framework/laminas/public/"
    "http://192.168.56.50/phpfs/framework/laravel/public/"
    "http://192.168.56.50/phpfs/framework/symfony/public/"
    "http://192.168.56.50/phpfs/framework/yii/web/"
)

# Array of human-readable names for the URLs
names=(
    "ci4"
    "fat-free"
    "laminas"
    "laravel"
    "symfony"
    "yii"
)

# Loop through each URL and its corresponding name
for index in "${!urls[@]}"; do
    url="${urls[$index]}"
    name="${names[$index]}"

    # Restart PHP-FPM and Apache
    sudo systemctl restart php8.1-fpm.service apache2.service
    echo "Restarted PHP and Apache before processing: $url"

    # Fetch the content and extract the JSON
    raw_output=$(curl -s "$url")
    curl_status=$? # Get the exit code of the curl command

    # Save the HTML content in the specified folder with a meaningful name
    echo "Save raw HTML as $output_folder/$name.html"
    echo "$raw_output" > "$output_folder/$name.html"

    # Check if curl was successful
    if [ $curl_status -ne 0 ]; then
        echo "Error: curl failed to fetch data from $url. Curl exit code: $curl_status"
        continue # Skip to the next URL
    fi

    # Remove <pre> and </pre> tags from the raw HTML using sed
    raw_output_no_pre=$(echo "$raw_output" | sed 's/<pre>//g; s/<\/pre>//g')

    # Extract the JSON part using the refined sed command
    json_output=$(echo "$raw_output_no_pre" | sed -n '/cesp_log--{/,/}--cesp_log/{s/cesp_log--//;s/--cesp_log//;p}')

    # Check if JSON was found
    if [[ -n "$json_output" ]]; then
        # Save the JSON data to a file named after the corresponding name
        echo "Save JSON data as $output_folder/$name.json"
        echo "$json_output" > "$output_folder/$name.json"
    else
        echo "No JSON data found in the output of $url"
    fi

    # Delay for 5 seconds before moving to the next URL
    sleep 5
done

echo "Finished processing all URLs."
