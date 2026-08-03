<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$apiKey = $_ENV['YOUTUBE_API_KEY'] ?? '';
$videoIds = str_replace(["\r", "\n", " "], '', $_ENV['YOUTUBE_VIDEO_IDS'] ?? '');

$videos = [];
$erroApi = null;

if (!empty($apiKey) && !empty($videoIds)) {
    // URL direta da API do YouTube (Sem cURL de token, sem 403!)
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
                    // Pega a capa em alta resolução (se não tiver, pega a padrão)
                    $thumbnail = $video['snippet']['thumbnails']['high']['url'] ?? $video['snippet']['thumbnails']['default']['url'];
                    $videoId = $video['id'];
                    $linkYoutube = "https://www.youtube.com/watch?v={$videoId}";
                ?>
                <div class="music-card">
                    <img class="card-player" src="<?php echo $thumbnail; ?>" alt="Capa do Vídeo" style="object-fit: cover; aspect-ratio: 16/9; width: 100%;">
                    
                    <div class="card-info" style="padding: 10px;">
                        <h3 style="font-size: 0.9rem; margin-bottom: 5px;"><?php echo $canal; ?></h3>
                        <p style="font-size: 0.8rem; height: 2.4em; overflow: hidden;"><?php echo $titulo; ?></p>
                        
                        <a href="<?php echo $linkYoutube; ?>" target="_blank" style="display: block; margin-top: 10px; color: #FF0000; text-decoration: none; font-weight: bold; font-size: 0.85rem;">
                            Assistir no YouTube <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                
            <?php else: ?>
                <p style="color: white; padding: 20px;">Nenhum vídeo encontrado.</p>
            <?php endif; ?>
            
        </div>
    </div>
</section>