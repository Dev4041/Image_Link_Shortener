<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['mappings'])) {
        echo json_encode(['status' => 'error', 'message' => 'No mappings provided']);
        exit;
    }

    $newMappings = $data['mappings'];
    
    include 'mappings.php';
    foreach ($newMappings as $file => $url) {
        $mappings[$file] = $url;
    }

    $exported = "<?php\n\$mappings = " . var_export($mappings, true) . ";\n?>";
    file_put_contents('mappings.php', $exported);

    echo json_encode(['status' => 'success', 'message' => 'Mappings updated']);
}
?>
