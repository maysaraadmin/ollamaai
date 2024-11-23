<?php
namespace local_ollamaai;

defined('MOODLE_INTERNAL') || die();

class api {
    private $apikey;

    public function __construct() {
        $this->apikey = get_config('local_ollamaai', 'apikey');
    }

    public function call_api($endpoint, $data) {
        $url = "https://api.ollama.ai/{$endpoint}";

        $curl = new \curl();
        $options = [
            'CURLOPT_RETURNTRANSFER' => true,
            'CURLOPT_HTTPHEADER' => [
                "Authorization: Bearer {$this->apikey}",
                'Content-Type: application/json',
            ],
        ];

        return json_decode($curl->post($url, json_encode($data), $options), true);
    }

    public function generate_text($prompt) {
        return $this->call_api('generate', ['prompt' => $prompt]);
    }
}
