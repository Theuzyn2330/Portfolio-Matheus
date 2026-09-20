<?php
$arquivoSkills = __DIR__ . '/../assets/data/skills.json';
$skills = [];

if (is_readable($arquivoSkills)) {
	$conteudoSkills = file_get_contents($arquivoSkills);
	$skills = json_decode($conteudoSkills, true) ?? [];
}
?>

<section class="skills-section" id="skills">
	<div class="skills-heading">
		<p class="skills-eyebrow">O que eu faço</p>
		<h2>Minhas <span>skills</span></h2>
		<p>Conhecimentos que uso para transformar ideias em sistemas funcionais.</p>
	</div>

	<?php if (!empty($skills)): ?>
		<div class="skills-carousel" data-skills-carousel>
			<div class="skills-viewport">
				<div class="skills-track" data-skills-track>
					<div class="skills-group">
						<?php foreach ($skills as $skill): ?>
							<button class="skill-tag" type="button" aria-expanded="false">
								<span class="skill-tag-name"><?= htmlspecialchars($skill['tag'] ?? 'Skill'); ?></span>
								<span class="skill-description" role="tooltip"><?= htmlspecialchars($skill['descricao'] ?? ''); ?></span>
							</button>
						<?php endforeach; ?>
					</div>
					<div class="skills-group" aria-hidden="true">
						<?php foreach ($skills as $skill): ?>
							<button class="skill-tag" type="button" tabindex="-1">
								<span class="skill-tag-name"><?= htmlspecialchars($skill['tag'] ?? 'Skill'); ?></span>
								<span class="skill-description" role="tooltip"><?= htmlspecialchars($skill['descricao'] ?? ''); ?></span>
							</button>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</section>
