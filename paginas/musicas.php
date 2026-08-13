<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

$apiKey = $_ENV['YOUTUBE_API_KEY'] ?? getenv('YOUTUBE_API_KEY') ?? '';
$videoIds = str_replace(["\r", "\n", " "], '', $_ENV['YOUTUBE_VIDEO_IDS'] ?? getenv('YOUTUBE_VIDEO_IDS') ?? '');

$videos = [];
$erroApi = null;

if (!empty($apiKey) && !empty($videoIds)) {

    $url = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id={$videoIds}&key={$apiKey}";

    // Requisição via cURL simples
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $data = json_decode($response, true);

    if ($httpCode === 200 && isset($data['items'])) {
        $videos = $data['items'];
    } else {
        $erroApi = "Erro HTTP {$httpCode}: " . ($data['error']['message'] ?? 'Falha na API');
    }
} else {
    $erroApi = "Configure a YOUTUBE_API_KEY e os YOUTUBE_VIDEO_IDS no arquivo .env!";
}
?>

<section class="projects-section" id="musicas">
    <h2>Músicas que eu curto</h2>

    <button class="carousel-btn btn-left" onclick="moveCarousel(-1, this)"  title="Tudo usando API Youtube V3 :)" ><i class="fas fa-chevron-left"></i></button>
    <button class="carousel-btn btn-right" onclick="moveCarousel(1, this)"  title="Tudo usando API Youtube V3 :)" ><i class="fas fa-chevron-right"></i></button>

    <div class="carousel-container">
        <div class="carousel-track" id="track">
            
            <?php if ($erroApi): ?>
                <div style="background: rgba(255,0,0,0.2); border: 1px solid red; color: white; padding: 20px; border-radius: 8px; width: 80%; margin: 0 auto; text-align: center;">
                    <strong>Atenção:</strong> <?php echo $erroApi; ?>
                </div>
            <?php elseif (!empty($videos)): ?>
                
                <?php foreach ($videos as $video): 
                    $titulo = $video['snippet']['title'];
                    $canal = $video['snippet']['channelTitle'];
                    $videoId = $video['id']; // Pegamos o ID para usar no iframe
                ?>
                <div class="music-card">
                    <!-- Iframe do Miniplayer do YouTube -->
                    <iframe 
                        class="card-player" 
                        src="https://www.youtube.com/embed/<?php echo $videoId; ?>" 
                        title="YouTube video player" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen
                        style="width: 100%; aspect-ratio: 16/9; border: none; object-fit: cover;">
                    </iframe>
                    
                    <div class="card-info" style="padding: 10px;">
                        <h3 style="font-size: 0.9rem; margin-bottom: 5px;"><?php echo $canal; ?></h3>
                        <p style="font-size: 0.8rem; height: 2.4em; overflow: hidden;"><?php echo $titulo; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
                
            <?php else: ?>
                <p style="color: white; padding: 20px;">Nenhum vídeo encontrado.</p>
            <?php endif; ?>
            
        </div>
    </div>
</section>