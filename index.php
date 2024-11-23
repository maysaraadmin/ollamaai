
<?php
require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir . '/adminlib.php');

require_login();
$context = context_system::instance();
require_capability('moodle/site:config', $context);

$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/ollamaai/index.php'));
$PAGE->set_title('Ollama AI Integration');
$PAGE->set_heading('Ollama AI Integration');

echo $OUTPUT->header();
echo $OUTPUT->heading('Ollama AI Test Page');

if ($prompt = optional_param('prompt', '', PARAM_TEXT)) {
    $api = new \local_ollamaai\api();
    $response = $api->generate_text($prompt);
    echo html_writer::div('Response: ' . s($response['text']));
}

$form = '
    <form method="post">
        <textarea name="prompt" rows="4" cols="50" placeholder="Enter your prompt"></textarea>
        <br><br>
        <button type="submit">Generate Text</button>
    </form>
';
echo $form;

echo $OUTPUT->footer();

